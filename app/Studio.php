<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $guarded = [];

    public function kursi()
    {
        return $this->hasMany(Kursi::class, 'id_studio', 'id');
    }

    public function jadwaltayangs()
    {
        return $this->hasMany(JadwalTayang::class, 'id_studio', 'id');
    }
}
