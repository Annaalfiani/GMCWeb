<?php

namespace App\Http\Controllers\admin;

use App\DataFilm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\VarDumper\Cloner\Data;

class DataFilmController extends Controller
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
        $datas = DataFilm::where('status', '1')->get();
        return view('pages.admin.data_film.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $data = DataFilm::all();
        return view('pages.admin.data_film.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|file|image|mimes:jpg,png,jpeg|max:2048',
            'judul' => 'required|unique:data_films',
            'sinopsis' => 'required',
            'genre' => 'required',
            'durasi' => 'required',

        ]);

        $image=$request->file('foto');
        $filename=rand().'.'.$image->getClientOriginalExtension();
        $path=public_path('uploads/admin');
        $image->move($path,$filename);


        $data = new DataFilm();
        $data->foto = $filename;
        $data->judul = $request->judul;
        $data->sinopsis = $request->sinopsis;
        $data->genre = $request->genre;
        $data->durasi = $request->durasi;
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
        $this->validate($request, [
            'foto' => 'file|image|mimes:jpg,png,jpeg|max:2048',
            'judul' => 'required',
            'sinopsis' => 'required',
            'genre' => 'required',
            'durasi' => 'required',

        ]);
        $data = DataFilm::find($id);
        $image=$request->file('foto');
        $data->judul = $request->judul;
        $data->sinopsis = $request->sinopsis;
        $data->genre = $request->genre;
        $data->durasi = $request->durasi;

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
        $data->update(['status'=>'0']);
        return redirect()->route('data_film.index')->with('dalete', 'Berhasil Menghapus Data');
    }
}
