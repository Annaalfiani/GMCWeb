<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HourResource extends JsonResource
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
            "id" => $this->jadwaltayang->id,
            "harga" => $this->jadwaltayang->harga,
            "harga_weekend" => $this->jadwaltayang->harga_weekend,
            "date" => Carbon::parse($this->date->tanggal)->format('d-m-Y'),
            "hour" => Carbon::parse($this->jam)->format('H:i'),
            "studio" => new HourStudioResource($this->studio)
        ];
    }
}
