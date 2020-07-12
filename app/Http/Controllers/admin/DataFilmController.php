<?php

namespace App\Http\Controllers\admin;

use App\DataFilm;
use App\JadwalTayang;
use App\Studio;
use App\TanggalTayang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Cloner\Data;

class DataFilmController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $datas = DataFilm::orderBy('id','DESC')->get();

        $result = [];
        foreach ($datas as $data){
            $date = TanggalTayang::where('id_film', $data->id)->first();
            if ($date){
                $tanggal_comingsoon = Carbon::parse($date->tanggal)->subDays(4)->format('Y-m-d');
                //$now = Carbon::now()->format('Y-m-d');
                if (Carbon::now()->between( $tanggal_comingsoon, $date->tanggal)){
                    $status = 'Coming Soon';
                    $result[$data->id] =  $status;
                }elseif (Carbon::now()->format('Y-m-d') == $date->tanggal){
                    $status = 'Sedang Tayang';
                    $result[$data->id] =  $status;
                }else{
                    $status = 'Kadaluarsa';
                    $result[$data->id] =  $status;
                }
            }else{
                $status = "Belum Ada Jadwal Tayang";
                $result[$data->id] =  $status;
            }
        }

        return view('pages.admin.data_film.index', compact('datas', 'result'));
    }

    public function create()
    {
        $data = DataFilm::all();
        return view('pages.admin.data_film.create', compact('data'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|file|image|mimes:jpg,png,jpeg|max:2048',
            'judul' => 'required|unique:data_films',
            'sinopsis' => 'required',
            'genre' => 'required',
            'durasi' => 'required',

        ]);

        /*$image=$request->file('foto');
        $filename=rand().'.'.$image->getClientOriginalExtension();
        $path=public_path('uploads/admin');
        $image->move($path,$filename);*/


        $data = new DataFilm();
        $data->judul = $request->judul;
        $data->sinopsis = $request->sinopsis;
        $data->genre = $request->genre;
        $data->durasi = $request->durasi;

        $file = $request->file('foto');
        $file_name = date('ymdHis') . "-" . $file->getClientOriginalName();
        $file_path = 'data-films/' . $file_name;
        Storage::disk('s3')->put($file_path, file_get_contents($file));
        $data->foto = Storage::disk('s3')->url($file_path, $file_name);

        $data->save();

        return redirect()->route('data_film.index')->with('create', 'Berhasil Menambahkan Data');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DataFilm::find($id);
        return view('pages.admin.data_film.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DataFilm::find($id);
        return view('pages.admin.data_film.edit', compact('data'));
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
        /*$this->validate($request, [
            'foto' => 'file|image|mimes:jpg,png,jpeg|max:2048',
            'judul' => 'required',
            'sinopsis' => 'required',
            'genre' => 'required',
            'durasi' => 'required',

        ]);*/
        $data = DataFilm::find($id);
        $image=$request->file('foto');
        $data->judul = $request->judul;
        $data->sinopsis = $request->sinopsis;
        $data->genre = $request->genre;
        $data->durasi = $request->durasi;
        $data->status = $request->status;

        if ($image==''){
            $data->foto=$request->old_foto;
        }else{
            $filename=time().'.'.$image->getClientOriginalExtension();
            $path=public_path('uploads/admin');
            $image->move($path,$filename);
            $data->foto = $filename;
        }


        $data->update();
        return redirect()->route('data_film.index')->with('update', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataFilm::find($id);
        $data->update(['status'=> 1 ]);
        return redirect()->route('data_film.index')->with('dalete', 'Berhasil Menghapus Data');
    }

    public function getStudio($id)
    {
        $studios = Studio::all();
        $results = [];
        foreach ($studios as $key => $studio){
            $jadwals = JadwalTayang::where('id_film', $id)->get();
            if ($studio->id != isset($jadwals[$key]->id_studio)){
                array_push($results, $studio);
            }
        }

        return $results;

    }
}
