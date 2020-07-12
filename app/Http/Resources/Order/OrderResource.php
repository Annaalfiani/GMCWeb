<?php

namespace App\Http\Resources\Order;

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
            "customer" => new CustomerResource($this->customer),
            'studio' => new StudioResource($this->studio),
            'film' => new FilmResource($this->film),
            'jadwal_tayang' => new JadwalTayangResource($this->id_jadwal_tayang),
            'tanggal' => $this->tanggal,
            'jam' => $this->jam,
            'snap' => $this->snap,
            'status' => $this->status,
        ];
    }
}
