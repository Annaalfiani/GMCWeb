<?php

namespace App\Http\Controllers\admin;

use App\DataFilm;
use App\JadwalTayang;
use App\JamTayang;
use App\Studio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JadwalTayangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $datas = JadwalTayang::all();
        return view('pages.admin.jadwal_tayang.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = JadwalTayang::all();
        $datafilms = DataFilm::where('status','1')->orWhere('status','2')->get();

        $studios = Studio::all();
        return view('pages.admin.jadwal_tayang.create', compact('data', 'datafilms', 'studios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new JadwalTayang();
        $data->id_film= $request->id_film;
        $data->id_studio = $request->id_studio;
        $data->harga = $request->harga;
        $data->tanggal_mulai = Carbon::parse($request->mulai)->format('Y-m-d');
        $data->tanggal_selesai = Carbon::parse($request->selesai)->format('Y-m-d');
        $data->save();


        $jam_tayangs = $request->jam_tayang;
        foreach ($jam_tayangs as $jam_tayang){
            $itemjams[] = [
                'id_jadwal_tayang' => $data->id,
                'jam_tayang' => $jam_tayang,

            ];
        }
        DB::table('jam_tayangs')->insert($itemjams);

        /*return response()->json([
            'data' => $data,
           'jam' => [
               'jam' => $itemjams,
           ],
        ]);*/

        return redirect()->route('jadwal_tayang.index')->with('create', 'Berhasil Menambahkan Data');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = JadwalTayang::find($id);
        return view('pages.admin.jadwal_tayang.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JadwalTayang::find($id);
        $datafilms = DataFilm::whereIn('status', ['1', '2'])->get();
        $studios = Studio::all();
        return view('pages.admin.jadwal_tayang.edit', compact('data', 'datafilms', 'studios'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'jam_tayang' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'harga' => 'required',

        ]);

        $mulai =  strtotime(str_replace('/','-',$request->tanggal_mulai));
        $selesai =  strtotime(str_replace('/','-',$request->tanggal_selesai));
//        dd($mulai);

        $mulai = date('Y-m-d', $mulai);
        $selesai = date('Y-m-d', $selesai);


        $data = JadwalTayang::find($id);
        $data->id_film = $request->id_film;
        $data->id_studio = $request->id_studio;
        $data->tanggal_mulai = $mulai;
        $data->tanggal_selesai = $selesai;
        $data->harga = $request->harga;
        $data->update();

        $jam_tayangs = $request->jam_tayang;
        foreach ($jam_tayangs as $jam_tayang){
            $itemjams = [
                'id_jadwal_tayang' => $data->id,
                'jam_tayang' => $jam_tayang,

            ];
        }
        DB::table('jam_tayangs')->where('id_jadwal_tayang', $data->id)->update($itemjams);

        return redirect()->route('jadwal_tayang.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JadwalTayang::find($id);
        $data->update(['status'=> 0 ]);
        return redirect()->route('jadwal_tayang.index')->with('dalete', 'Berhasil Menghapus Data');
    }
}
