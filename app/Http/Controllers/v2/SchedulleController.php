<?php

namespace App\Http\Controllers\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v2\{HoursResource, SchedulleResource, StudioResource};
use App\{JamTayang, Studio, TanggalTayang};

class SchedulleController extends Controller
{
    public function schedulle($filmId)
    {
        $schedulles = TanggalTayang::where('id_film', $filmId)
        ->whereDate('tanggal', '>=', now())
        //->groupBy('tanggal')
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

    function searchForDate($date, $array) {
        foreach ($array as $val) {
            if ($val['tanggal'] === $date) {
                return $val;
            }
        }
        return null;
     }

    public function studio(Request $request)
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

    public function timeByDate($dateId, $studioId)
    {
        $hours = JamTayang::where('id_tanggal_tayang', $dateId)->where('id_studio', $studioId)->get();
        $removeDuplicate = $this->unique_multidimensional_array($hours, 'jam');
        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => HoursResource::collection(collect($removeDuplicate))
        ]);
    }

    function unique_multidimensional_array($array, $key) {
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
}
