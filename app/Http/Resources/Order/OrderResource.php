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
            "customer"      => new CustomerResource($this->customers),
            'studio'        => new StudioResource($this->studios),
            'film'          => new FilmResource($this->films),
            'jadwal_tayang' => new JadwalTayangResource($this->id_jadwal_tayangs),
            'tanggal'       => $this->tanggal,
            'jam'           => $this->jam,
            'snap'          => $this->snap,
            'status'        => $this->status,
        ];
    }
}
