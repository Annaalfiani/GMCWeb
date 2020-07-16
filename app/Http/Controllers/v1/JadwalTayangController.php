<?php

namespace App\Http\Controllers\v1;

use App\Http\Resources\HourResource;
use App\Http\Resources\JadwalTayangResource;
use App\Http\Resources\SchedulleResource;
use App\JadwalTayang;
use App\JamTayang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalTayangController extends Controller
{
    public function jadwal($id)
    {
//        $hours = JamTayang::whereHas('date', function ($queryDate)use ($id){
//            $queryDate->whereHas('schedulle', function ($querySchedulle)use ($id){
//                $querySchedulle->whereHas('dataFilm', function ($queryMovie)use ($id){
//                     $queryMovie->where('id', $id);
//                });
//            });
//        })->get();

        $now = Carbon::now()->format('Y-m-d');
        $jamSekarang = Carbon::now()->format('H:i');

        $hours = JamTayang::whereHas('date', function ($queryDate)use ($id, $now){
            $queryDate->whereHas('schedulle', function ($querySchedulle)use ($id){
                $querySchedulle->whereHas('dataFilm', function ($queryMovie)use ($id){
                    $queryMovie->where('id', $id);
                });
            })->whereDate('tanggal', '>=', $now);
        })->whereTime('jam', '>', $jamSekarang)->get();

        return response()->json([
            'mesage' => 'success',
            'status' => true,
            'data' => HourResource::collection($hours)
        ]);
    }
}
