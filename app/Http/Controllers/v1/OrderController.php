<?php

namespace App\Http\Controllers\v1;

use App\Order;
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
        $order = new Order();
        $order->id_customer = Auth::guard('api')->user()->id;
        $order->id_studio = $request->id_studio;
        $order->id_film = $request->id_film;
        $order->id_jadwal_tayang = $request->id_jadwal_tayang;
        $order->save();

        $orderkursi = new OrderKursi();
        $orderkursi->id_order = $order->id;
        $orderkursi->id_kursi = $request->id_kursi;
        $orderkursi->save();

        return response()->json([
            'message' => 'berhasail order bioskop',
            'status' => true,
            'data' => [
                'order' => $order,
                'order_kursi' => $orderkursi
            ]
        ]);
    }
}
