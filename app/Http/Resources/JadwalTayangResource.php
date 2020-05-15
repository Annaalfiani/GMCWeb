<?php

namespace App\Http\Resources;

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
            "tanggal_mulai" => $this->tanggal_mulai,
            "tanggal_selesai" => $this->tanggal_selesai,
            "studio" => new StudioResource($this->studio),
            "jam" => JamTayangResource::collection($this->jamtayangs)

        ];
    }
}
