<?php

namespace App\Http\Resources\Order;

use Carbon\Carbon;
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
            'jadwal_tayang' => new JadwalTayangResource($this->jadwaltayangs),
            'tanggal'       => Carbon::parse($this->tanggal)->format('d-m-Y'),
            'jam'           => Carbon::parse($this->jam)->format('H:i'),
            'snap'          => $this->snap,
            'status'        => $this->status,
        ];
    }
}
