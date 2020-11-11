<?php

namespace App\Http\Controllers\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v2\HoursResource;
use App\Http\Resources\v2\SchedulleResource;
use App\Http\Resources\v2\StudioResource;
use App\JadwalTayang;
use App\JamTayang;
use App\Studio;
use App\TanggalTayang;

class SchedulleController extends Controller
{
    public function schedulle($filmId)
    {
        $schedulles = TanggalTayang::where('id_film', $filmId)->get();

        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => SchedulleResource::collection($schedulles)
        ]);
    }

    public function studio(Request $request)
    {
        $studios = Studio::with(['tanggaltayangs' => function($tanggal) use($request){
            $tanggal->whereDate('tanggal', $request->date);
        }])->get();

        $res = [];
        foreach ($studios as $studio) {
            if(count($studio->tanggaltayangs) != 0){
                array_push($res, $studio);
            }
        }

        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => StudioResource::collection(collect($res))
        ]);
    }

    public function timeByDate($dateId, $studioId)
    {
        $hours = JamTayang::where('id_tanggal_tayang', $dateId)->where('id_studio', $studioId)->get();
        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => HoursResource::collection($hours)
        ]);
    }
}
