<?php

namespace App\Http\Controllers\admin;

use App\Order;
use Carbon\Carbon;
use App\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Customer, JadwalTayang, JamTayang, Studio, TanggalTayang, User};
use App\Http\Resources\v2\{HoursResource, SchedulleResource, StudioResource, SeatResource};
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{

    public function index()
    {
        return view('pages.admin.order.index');
    }

    public function create()
    {
        $daynow = Carbon::now()->translatedFormat('l, d F Y'); 
        $now = Carbon::now()->translatedFormat('Y-m-d');
        $dates = TanggalTayang::with('film')->whereDate('tanggal', $now)->get();
        $results = [];
        foreach ($dates as $date){
            if (!in_array($date->film, $results)) {
                array_push($results, $date->film);
            }
        }
        return view('pages.admin.order.create', [
            'now' => $now,
            'day_now' => $daynow,
            'nowPlayings' => $results
        ]);
    }

    public function getSchedulle($filmId)
    {
        $schedulles = TanggalTayang::where('id_film', $filmId)
        ->whereDate('tanggal', '>=', now())
        ->get();

        $res = [];
        foreach ($schedulles as $schedulle) {
            if(!$this->searchForDate($schedulle->tanggal, $res)){
                array_push($res, $schedulle);
            }
        }

        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => SchedulleResource::collection(collect($res))
            //'data' => $res
        ]);
    }

    function searchForDate($date, $array) 
    {
        foreach ($array as $val) {
            if ($val['tanggal'] === $date) {
                return $val;
            }
        }
        return null;
    }

    public function getStudios(Request $request)
    {
        $studios = Studio::with(['tanggaltayangs' => function($tanggal) use($request){
            $tanggal->whereDate('tanggal', $request->date)->where('id_film', $request->filmId);
        }])->get();

        $res = [];
        foreach ($studios as $studio) {
            if(count($studio->tanggaltayangs) > 0){
                array_push($res, $studio);
            }
        }

        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => StudioResource::collection(collect($res))
        ]);
    }

    public function getHours($dateId, $studioId)
    {
        $hours = JamTayang::where('id_tanggal_tayang', $dateId)->where('id_studio', $studioId)->get();
        $removeDuplicate = $this->unique_multidimensional_array($hours, 'jam');
        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => HoursResource::collection(collect($removeDuplicate))
        ]);
    }

    public function getPrice($dateId)
    {
        $tgl = TanggalTayang::whereId($dateId)->first();
        $day = Carbon::parse($tgl->tanggal)->translatedFormat('l');
        if ($day == 'Sabtu' || $day == 'Minggu') {
            return $tgl->schedulle->harga_weekend;
        }
        return $tgl->schedulle->harga;
    }

    function unique_multidimensional_array($array, $key) 
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();
    
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function getSeats(Request $request)
    {
        $studio = Studio::where('id', $request->id_studio)->first();
        return response()->json([
            'message' => 'berhasil ambil kursi yg kosong',
            'status' => true,
            'data' => new SeatResource($studio)
        ]);
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
            })->where('id_kursi', $seat)->first();

            if ($checkOrder){
                return response()->json(['message' => 'kursi pada tanggal dan jam tersebut sudah di pesan orang', 'status' => false]);
            }
        }

        $tanggal = Carbon::parse($date->tanggal)->format('Y-m-d');

        $order = new Order();
        $order->id_customer = $this->createCustomer();
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
            $orderDetails->id_kursi = $seat;
            $orderDetails->price = $request->harga;
            $orderDetails->save();
        }

        return response()->json([
            'message' => 'berhasil order bioskop',
            'status' => true
        ]);
    }

    private function createCustomer()
    {
        $cust =  Customer::create([
            'name' => 'cust-'.rand(1, 1000000).random_int(1, 100),
            'email' => 'cust-'.rand(1, 1000000).random_int(1, 100).'@exp.com',
            'password' => Hash::make('123456')
        ]);

        return $cust->id;
    }
}
