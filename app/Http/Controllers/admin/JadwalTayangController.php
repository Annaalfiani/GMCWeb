<?php

namespace App\Http\Controllers\admin;

use App\DataFilm;
use App\JadwalTayang;
use App\Studio;
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

        $startDate = strtotime($request->start);
        $start = date('Y-m-d', $startDate);
        $endDate = strtotime($request->end);
        $end = date('Y-m-d', $endDate);

        $data = new JadwalTayang();
        $data->id_film= $request->id_film;
        $data->id_studio = $request->id_studio;
        $data->harga = $request->harga;
        $data->jam_tayang =  implode(',',$request->jam_tayang);
        $data->tanggal_mulai = $start;
        $data->tanggal_selesai = $end;
        $data->save();

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

        $startDate = strtotime($request->start);
        $start = date('Y-m-d', $startDate);
        $endDate = strtotime($request->end);
        $end = date('Y-m-d', $endDate);

        $data = JadwalTayang::find($id);
        $data->id_film= $request->id_film;
        $data->id_studio = $request->id_studio;
        $data->harga = $request->harga;
        $data->jam_tayang =  implode(',',$request->jam_tayang);
        $data->tanggal_mulai = $start;
        $data->tanggal_selesai = $end;
        $data->update();

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
        $data->delete();
        return redirect()->route('jadwal_tayang.index')->with('dalete', 'Berhasil Menghapus Data');
    }
}
