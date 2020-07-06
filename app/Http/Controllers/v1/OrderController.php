<?php

namespace App\Http\Controllers\v1;

use App\Http\Resources\OrderResource;
use App\Order;
use App\OrderDetails;
use App\OrderKursi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('api');
    }

    public function order(Request $request)
    {
//        $this->validate($request,[
//           'tanggal' => 'required',
//           'jam' => 'required'
//        ]);

        $checkOrder = Order::where('id_kursi', $request->id_kursi)
            ->where('id_studio', $request->id_studio)
            ->where('id_film', $request->id_film)
            ->where('id_jadwal_tayang', $request->id_jadwal_tayang)
            ->where('tanggal', $request->tanggal)
            ->where('jam', $request->jam)
            ->first();

        if ($checkOrder){
            return response()->json(['message' => 'kursi pada tanggal dan jam tersebut sudah di pesan orang', 'status' => false]);
        }


        $order = new Order();
        $order->id_customer = Auth::guard('api')->user()->id;
        $order->id_studio = $request->id_studio;
        $order->id_film = $request->id_film;
        $order->id_jadwal_tayang = $request->id_jadwal_tayang;
        $order->tanggal = $request->tanggal;
        $order->jam = $request->jam;
        $order->save();

        $seats = $request->kursi;
        foreach ($seats as $seat){
            $orderDetails = new OrderDetails();
            $orderDetails->id_order = $order->id;
            $orderDetails->id_kursi = $seat['id_kursi'];
            $orderDetails->save();
        }
        return response()->json([
            'message' => 'berhasail order bioskop',
            'status' => true,
            //'data' => new OrderResource($order)
        ]);
    }
}
