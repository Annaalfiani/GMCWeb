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

    public function jadwaltayangs()
    {
        return $this->hasOne(JadwalTayang::class,'id_film','id');
    }

    public function date()
    {
        return $this->hasMany(TanggalTayang::class, 'id_film', 'id');
    }

}
