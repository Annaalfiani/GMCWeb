<?php

namespace App\Http\Controllers\admin;

use App\Pemain;
use App\Studio;
use App\DataFilm;
use Carbon\Carbon;
use App\JadwalTayang;
use App\TanggalTayang;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Cloner\Data;

class DataFilmController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except('getStudio');
    }

    public function index()
    {
        $datas = DataFilm::orderBy('id','DESC')->get();

        $result = [];
        foreach ($datas as $data){
            $now = Carbon::now()->format('Y-m-d');
            $date = TanggalTayang::where('id_film', $data->id)->whereDate('tanggal', $now)->first();
            $comingSoon = TanggalTayang::where('id_film', $data->id)->first();
            //$tanggal_comingsoon = Carbon::parse($dateComingSoon->tanggal)->subDays(4)->format('Y-m-d');
            if ($date){
                $status = 'Sedang Tayang';
                $result[$data->id] =  $status;
                $dateComingSoon = TanggalTayang::where('id_film', $data->id)->first();
                if ($dateComingSoon){
                    $tanggal_comingsoon = Carbon::parse($date->tanggal)
                        ->subDays(4)->format('Y-m-d');
                    if ($tanggal_comingsoon){
                        if (Carbon::now()->between( $tanggal_comingsoon, $date->tanggal)){
                            $status = 'Coming Soon';
                            $result[$data->id] = $status;
                        }
//                        else{
//                            $status = "Kadaluarsa";
//                            $result[$data->id] =  $status;
//                        }
                    }
                }else{
                    $status = "Belum Ada Jadwal Tayang";
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
//        $rules =[
//            'foto' => 'required|file|image|mimes:jpg,png,jpeg|max:2048',
//            'judul' => 'required|unique:data_films',
//            'sinopsis' => 'required',
//            'genre' => 'required',
//            'durasi' => 'required',
//
//
//        ];

        /*$image=$request->file('foto');
        $filename=rand().'.'.$image->getClientOriginalExtension();
        $path=public_path('uploads/admin');
        $image->move($path,$filename);*/


//        $message = [
//
//            'required|file|image|mimes:jpg,png,jpeg|max:2048' => ':attribute tidak boleh kosong',
//            'unique' => ':attribute sudah terdaftar',
//            'required' => ':attribute tidak boleh kosong',
//            'mimes' => 'Hanya dapat upload gambar',
//
//        ];
//
//        $this->validate($request, $rules, $message);

        $data = new DataFilm();
        $data->judul = $request->judul;
        $data->sutradara = $request->sutradara;
        $data->sinopsis = $request->sinopsis;
        $data->genre = $request->genre;
        $data->bahasa = $request->bahasa;
        $data->durasi = $request->durasi;
        $data->tanggal_rilis = Carbon::parse($request->tanggal_rilis)->format('Y-m-d');

        $file = $request->file('foto');
        $file_name = date('ymdHis') . "." . $file->getClientOriginalName();
        $file_path = 'uploads/movies/';
		$file->move($file_path, $file_name);
		$data->foto = $file_path.$file_name;
        $data->save();

        $actors = $request->pemain;
        foreach ($actors as $actor) {
            $pemain = new Pemain();
            $pemain->id_film  = $data->id;
            $pemain->nama = $actor;
            $pemain->save();
        };

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
//        $pemains = Pemain::where('id_film', $id)->where('id_film', $data->film->id)->get('nama');
//        $results = [];
//        foreach ($pemains as $pemain){
//            array_push($results, $pemain->nama);
//        }
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

//        if ($image==''){
//            $data->foto=$request->old_foto;
//        }else{
//            $filename=time().'.'.$image->getClientOriginalExtension();
//            $path=public_path('uploads/admin');
//            $image->move($path,$filename);
//            $data->foto = $filename;
//        }

		$file = $request->file('foto');
		$file_name = date('ymdHis') . "." . $file->getClientOriginalExtension();
		$file_path = 'uploads/movies/';
		$file->move($file_path, $file_name);
		$data->foto = $file_path.$file_name;

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
        $data->delete();
        return redirect()->route('data_film.index')->with('dalete', 'Berhasil Menghapus Data');
    }

    public function getStudio($id)
    {
        $studios = Studio::all();
        $results = [];
        foreach ($studios as $key => $studio){
            $jadwals = JadwalTayang::where('id_film', $id)->get()->toArray();
            $aa = array_search($studio->id, array_column($jadwals, 'id_studio'));
            if ($aa === false){
                array_push($results, $studio);
            }
        }
        return $results;
    }

    private function in_multiarray($elem, $array,$field)
    {
        $top = sizeof($array) - 1;
        $bottom = 0;
        while($bottom <= $top)
        {
            if($array[$bottom][$field] == $elem)
                return true;
            else
                if(is_array($array[$bottom][$field]))
                    if(in_multiarray($elem, ($array[$bottom][$field])))
                        return true;

            $bottom++;
        }
        return false;
    }

    private function clearArray($arr)
    {
        foreach($arr as $link)
        {
            if($link == null)
            {
                unset($link);
            }
        }
        return $arr;
    }

}