<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JamTayang extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function date()
    {
        return $this->belongsTo(TanggalTayang::class, 'id_tanggal_tayang', 'id');
    }

    public function studio(){
        return $this->belongsTo(Studio::class, 'id_studio', 'id');
    }


}
