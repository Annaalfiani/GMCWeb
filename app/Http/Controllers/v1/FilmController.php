<?php

namespace App\Http\Controllers\v1;

use App\DataFilm;
use App\Http\Resources\FilmResource;
use App\Http\Resources\JadwalTayangResource;
use App\Http\Resources\TestResource;
use App\JadwalTayang;
use App\TanggalTayang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\VarDumper\Cloner\Data;

class FilmController extends Controller
{
    public function film()
    {
        try{
            $films = DataFilm::all();

            return response()->json([
                'message' => 'success',
                'status' => true,
                'data' => FilmResource::collection($films)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function filmnowplaying()
    {
        try{
            $now = Carbon::now()->format('Y-m-d');
            $dates = TanggalTayang::with('film')->whereDate('tanggal', $now)->get();
            $results = [];
            foreach ($dates as $date){
                array_push($results, $date->film);
            }

            return response()->json([
                'message' => 'successfully get film now playing',
                'status' => true,
                'data' => $results
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false
            ]);
        }
    }

    public function filmcomingsoon()
    {
        try{
            $films = DataFilm::where('status', '1')->get();
            $results = [];
            foreach ($films as $film){
                $date = TanggalTayang::where('id_film', $film->id)->first();
                $tanggal = Carbon::parse($date->tanggal)->subDays(5)->format('Y-m-d');
                $now = Carbon::now()->format('Y-m-d');
                if ($now == $tanggal){
                    array_push($results, $film);
                }
            }

            return response()->json([
                'message' => 'successfully get film coming soon',
                'status' => true,
                'data' => $results
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function show($id)
    {
        try{
            $film = DataFilm::findOrFail($id);

            $result = [];
            if ($film->jadwaltayang->studio){
                $result = $film;
            }

            return response()->json([
                'message' => 'successfully get film by id',
                'status' => true,
                'data' => new FilmResource($film)
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
