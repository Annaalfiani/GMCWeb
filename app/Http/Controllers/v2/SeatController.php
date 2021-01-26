<?php

namespace App\Http\Controllers\v2;

use App\Studio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v2\SeatResource;

class SeatController extends Controller
{
    public function available(Request $request)
    {
        $studio = Studio::where('id', $request->id_studio)->first();
        return response()->json([
            'message' => 'berhasil ambil kursi yg kosong',
            'status' => true,
            'data' => new SeatResource($studio)
        ]);
    }
}
