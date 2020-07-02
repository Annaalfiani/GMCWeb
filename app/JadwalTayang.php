<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalTayang extends Model
{
    protected $guarded = [];

    public function datafilm(){
        return $this->belongsTo(DataFilm::class, 'id_film', 'id');
    }

    public function studio(){
        return $this->belongsTo(Studio::class, 'id_studio', 'id');
    }

    public function dates()
    {
        return $this->hasMany(TanggalTayang::class, 'id_jadwal_tayang', 'id');
    }

    public function hours()
    {
        return $this->hasMany(JamTayang::class, 'id_jadwal_tayang', 'id');
    }


}
