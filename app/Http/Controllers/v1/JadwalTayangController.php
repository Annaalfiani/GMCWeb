<?php

namespace App\Http\Controllers\v1;

use App\Http\Resources\JadwalTayangResource;
use App\JadwalTayang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalTayangController extends Controller
{
    public function jadwal($id)
    {
        $jadwal = JadwalTayang::where('id_film', $id)->get();

        return response()->json([
            'mesage' => 'aaa',
            'status' => true,
            'data' => JadwalTayangResource::collection($jadwal)
        ]);
    }
}
