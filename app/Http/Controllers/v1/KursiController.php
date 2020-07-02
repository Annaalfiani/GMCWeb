<?php

namespace App\Http\Controllers\v1;

use App\Http\Resources\KursiAvailableResource;
use App\Http\Resources\TotalSeatResource;
use App\Kursi;
use App\Order;
use App\OrderKursi;
use App\Studio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KursiController extends Controller
{
    public function available(Request $request)
    {
        //$kursis = Kursi::where('id_studio', $request->id_studio)->get();

        $studio = Studio::where('id', $request->id_studio)->first();


        return response()->json([
            'message' => 'berhasil ambil kursi yg kosong',
            'status' => true,
            //'data' => KursiAvailableResource::collection($kursis)
            'data' => new KursiAvailableResource($studio)
        ]);
    }
}
