<?php

namespace App\Http\Controllers\v1;

use App\Http\Resources\KursiAvailableResource;
use App\Kursi;
use App\Order;
use App\OrderKursi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KursiController extends Controller
{
    public function available(Request $request)
    {
        $kursis = Kursi::where('id_studio', $request->id_studio)->where('id_film', $request->id_film)->get();

        return response()->json([
            'message' => 'berhasil ambil kursi yg kosong',
            'status' => true,
            'data' => KursiAvailableResource::collection($kursis),
        ]);
    }
}
