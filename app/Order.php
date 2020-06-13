<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderkursi()
    {
        return $this->hasOne(OrderKursi::class, 'id_order', 'id');
    }
}
