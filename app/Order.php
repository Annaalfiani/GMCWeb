<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];


    public function customers()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

    public function studios()
    {
        return $this->belongsTo(Studio::class, 'id_studio', 'id');
    }

    public function films()
    {
        return $this->belongsTo(DataFilm::class, 'id_film', 'id');
    }

    public function jadwaltayangs()
    {
        return $this->belongsTo(JadwalTayang::class, 'id_jadwal_tayang', 'id');
    }

    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class, 'id_order', 'id');
    }
}
