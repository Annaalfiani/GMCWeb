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

    public function jam_tayangs(){
        return $this->hasMany(JamTayang::class, 'id_jadwal_tayang', 'id');
    }

}
