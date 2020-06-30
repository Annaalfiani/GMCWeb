<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class JadwalTayangResource extends JsonResource
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
            "id" => $this->id,
            "harga" => $this->harga,
            "jam" => $this->jam_tayang,
            "tanggal_mulai" => Carbon::parse($this->tanggal_mulai)->format('Y-m-d'),
            "tanggal_selesai" => Carbon::parse($this->tanggal_selesai)->format('Y-m-d'),
            "studio" => new StudioResource($this->studio),
        ];
    }
}
