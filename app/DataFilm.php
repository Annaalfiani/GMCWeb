<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFilm extends Model
{
    protected $guarded = [];

    public function jadwaltayang()
    {
        return $this->hasOne(JadwalTayang::class,'id_film','id');

    }
}
