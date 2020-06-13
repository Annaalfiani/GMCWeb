<?php

namespace App\Http\Controllers\admin;

use App\Kursi;
use App\Studio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudioController extends Controller
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
        $datas =Studio::all();
        return view('pages.admin.studio.index', compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.studio.create');
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
            'nama_studio' => 'required',
            'jumlah_kursi' => 'required',

        ]);

        $data = new Studio();
        $data->nama_studio = $request->nama_studio;
        $data->save();

        $jumlah_kursis = $request->jumlah_kursi;
        $nama_kursis = $request->nama_kursi;

        $item = [];
        foreach ($jumlah_kursis as $key => $value){
            for ($i = 1; $i <= $value; $i++){
                $item[] = [
                    'id_studio' => $data->id,
                    'nama_kursi' => $i.'-'.$nama_kursis[$key]
                ];
            }
        }

        DB::table('kursis')->insert($item);

        return redirect()->route('studio.index')->with('create', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Studio::find($id);
        return view('pages.admin.studio.edit', compact('data'));
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
        $data = Studio::find($id);
        $data->nama_studio = $request->nama_studio;
        $data->jumlah_kursi = $request->jumlah_kursi;
        $data->update();
        return redirect()->route('studio.index')->with('update', 'Berhasil Menghapus Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Studio::find($id);
        $data->delete();
        return redirect()->route('studio.index')->with('delete', 'Berhasil Menghapus Data');
    }
}
