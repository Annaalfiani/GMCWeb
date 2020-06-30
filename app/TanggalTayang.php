<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TanggalTayang extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function schedulle()
    {
        return $this->belongsTo(JadwalTayang::class, 'id_jadwal_tayang', 'id');
    }

    public function film(){
        return $this->belongsTo(DataFilm::class, 'id_film', 'id');
    }
}
