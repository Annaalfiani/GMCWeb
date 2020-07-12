<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }

    public function kursi()
    {
        return $this->belongsTo(Kursi::class, 'id_kursi', 'id');
    }
}
