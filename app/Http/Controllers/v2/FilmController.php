<?php

namespace App\Http\Controllers\v2;

use App\DataFilm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v2\FilmResource;
use App\TanggalTayang;
use Carbon\Carbon;

class FilmController extends Controller
{
    public function nowPlaying()
    {
        try{
            $now = Carbon::now()->format('Y-m-d');
            $dates = TanggalTayang::with('film')->whereDate('tanggal', $now)->get();
            $results = [];
            foreach ($dates as $date){
                if (!in_array($date->film, $results)) {
                    array_push($results, $date->film);
                }
            }

            return response()->json([
                'message' => 'successfully get film now playing',
                'status' => true,
                'data' => FilmResource::collection(collect($results))
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false
            ]);
        }
    }


    public function commingSoon()
    {
        try{
            $films = DataFilm::where('status', '1')->get();
            $results = [];
            foreach ($films as $film){
                $date = TanggalTayang::where('id_film', $film->id)->first();
                if ($date){
                    $tanggal_comingsoon = Carbon::parse($date->tanggal)->subDays(4)->format('Y-m-d');
                    //$now = Carbon::now()->format('Y-m-d');
                    if (Carbon::now()->between( $tanggal_comingsoon, $date->tanggal)){
                        array_push($results, $film);
                    }
                }

            }

            return response()->json([
                'message' => 'successfully get film coming soon',
                'status' => true,
                'data' => FilmResource::collection(collect($results))
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }
}
