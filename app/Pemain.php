<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    protected $guarded = [];

    public function film()
    {
        return $this->belongsTo(DataFilm::class, 'id_film', 'id');
    }
}
