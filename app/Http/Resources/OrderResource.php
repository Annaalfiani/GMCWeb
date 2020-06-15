<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id_customrer' => $this->id_customer,
            'id_studio' => $this->id_studio,
            'id_film' => $this->id_film,
            'id_jadwal_tayang' => $this->id_jadwal_tayang,
            'id_kursi' => $this->id_kursi,
            'tanggal' => $this->tanggal,
            'jam' => $this->jam,
            'snap' => $this->snap,
            'status' => $this->status,
        ];
    }
}
