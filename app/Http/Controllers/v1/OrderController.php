<?php

namespace App\Http\Controllers\v1;


use App\Http\Resources\Order\OrderDetailResource;
use App\Http\Resources\Order\OrderResource;
use App\Order;
use App\OrderDetails;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Midtrans\Snap;
use App\Http\Controllers\Midtrans\Config;
use App\TanggalTayang;

class OrderController extends Controller
{

    public function __construct()
    {
        Config::$serverKey = 'SB-Mid-server-erBHKuqnurGKdUqCjdi-rZRu';
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $this->middleware('auth:api')->except(['snapToken', 'checkTicket']);
    }

    public function order(Request $request)
    {
        $date = TanggalTayang::where('id', $request->tanggal)->first();
        foreach ($request->kursi as $seat) {
            $checkOrder = OrderDetails::whereHas('order', function ($query) use($request, $date){
                $query->where('id_studio', $request->id_studio)
                    ->where('id_film', $request->id_film)
                    ->where('id_jadwal_tayang', $date->id_jadwal_tayang)
                    ->where('tanggal', $date->tanggal)
                    ->where('jam', $request->jam);
            })->where('id_kursi', $seat['id'])->first();

            if ($checkOrder){
                return response()->json(['message' => 'kursi pada tanggal dan jam tersebut sudah di pesan orang', 'status' => false]);
            }
        }

        $tanggal = Carbon::parse($date->tanggal)->format('Y-m-d');

        $order = new Order();
        $order->id_customer = Auth::guard('api')->user()->id;
        $order->id_studio = $request->id_studio;
        $order->id_film = $request->id_film;
        $order->id_jadwal_tayang = $date->id_jadwal_tayang;
        $order->tanggal = $tanggal;
        $order->jam = $request->jam;
        $order->total_harga = $request->harga * count($request->kursi);
        $order->save();

        $seats = $request->kursi;
        foreach ($seats as $seat){
            $orderDetails = new OrderDetails();
            $orderDetails->id_order = $order->id;
            $orderDetails->id_kursi = $seat['id'];
            $orderDetails->price = $request->harga;
            $orderDetails->save();
        }

        return response()->json([
            'message' => 'berhasil order bioskop',
            'status' => true,
            'data' => $request->json()->all()
        ]);
    }

    // public function order(Request $request)
    // {
    //     //$tanggal = TanggalTayang::where('id', $request->tanggal)->first();
    //     foreach ($request->kursi as $seat) {
    //         $checkOrder = OrderDetails::whereHas('order', function ($query) use($request){
    //             $query->where('id_studio', $request->id_studio)
    //                 ->where('id_film', $request->id_film)
    //                 ->where('id_jadwal_tayang', $request->id_jadwal_tayang)
    //                 ->where('tanggal', $request->tanggal)
    //                 ->where('jam', $request->jam);
    //         })->where('id_kursi', $seat['id'])->first();

    //         if ($checkOrder){
    //             return response()->json(['message' => 'kursi pada tanggal dan jam tersebut sudah di pesan orang', 'status' => false]);
    //         }
    //     }

    //     $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');

    //     $order = new Order();
    //     $order->id_customer = Auth::guard('api')->user()->id;
    //     $order->id_studio = $request->id_studio;
    //     $order->id_film = $request->id_film;
    //     $order->id_jadwal_tayang = $request->id_jadwal_tayang;
    //     $order->tanggal = $tanggal;
    //     $order->jam = $request->jam;
    //     $order->total_harga = $request->harga * count($request->kursi);
    //     $order->save();

    //     $seats = $request->kursi;
    //     foreach ($seats as $seat){
    //         $orderDetails = new OrderDetails();
    //         $orderDetails->id_order = $order->id;
    //         $orderDetails->id_kursi = $seat['id'];
    //         $orderDetails->save();
    //     }

    //     return response()->json([
    //         'message' => 'berhasil order bioskop',
    //         'status' => true,
    //         'data' => $request->json()->all()
    //     ]);
    // }



    public function snapToken(Request $request)
    {
        $orders = $request->item_details;

        $item_details = [];
        foreach ($orders as $val) {

            $item_details[] = [
                'id' => $val['id'],
                'price' => $val['price'],
                'quantity' => $val['quantity'],
                'name' => $val['name']
            ];
        }

        $payload = [
            'transaction_details' => [
                'order_id' => rand()
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => 'aaa',
                'email' => 'a@gmail.com',
                'telephone' => '098378728',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($payload);
            //$snapOrder = Order::where('id', $request->item_details[0]['id'])->first();
            //$snapOrder->snap_token = $snapToken->token;
            //$snapOrder->update();
            return response()->json($snapToken);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function myOrders()
    {
        //$orders = Order::where('id_customer', Auth::guard('api')->user()->id)->get();
        $tickets = OrderDetails::whereHas('order', function ($order){
            $order->where('id_customer', Auth::guard('api')->user()->id);
        })->get();

        return response()->json([
            'message' => 'successfully get my orders',
            'status' => true,
            'data' => OrderDetailResource::collection($tickets)
        ]);
    }

    public function checkTicket($id)
    {
        $orderDetail = OrderDetails::where('id', $id)->where('expired', false)->first();
        $now = Carbon::now()->format('Y-m-d');
        $jam = Carbon::now()->format('H;i');

        if ($orderDetail){
            if ($orderDetail->order->tanggal < $now || $orderDetail->order->jam < $jam){
                return response()->json([
                    'message' => 'tiket sudah kadarluasa',
                    'status' => false,
                    'data' => (object)[]
                ]);
            }else{
                $orderDetail->expired = true;
                $orderDetail->update();

                return response()->json([
                    'message' => 'jalan mas bro',
                    'status' => true,
                    'data' => $orderDetail
                ]);
            }
        } else{
            return response()->json([
                'message' => 'tiket sudah kadarluasa',
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }
}
