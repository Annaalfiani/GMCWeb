<?php

namespace App\Http\Resources;

use App\Order;
use App\OrderKursi;
use Illuminate\Http\Resources\Json\JsonResource;

class KursiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'nama_kursi' => $this->nama_kursi,
        ];
    }
}
