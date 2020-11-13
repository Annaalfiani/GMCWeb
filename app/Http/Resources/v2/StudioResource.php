<?php

namespace App\Http\Resources\v2;

use App\TanggalTayang;
use Illuminate\Http\Resources\Json\JsonResource;

class StudioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = TanggalTayang::where('id_studio', $this->id)
        ->whereDate('tanggal', $request->date)
        ->where('id_film', $request->filmId)->first();
        
        return [
            "id"            => $this->id,
            "date_id"       => $date->id,
            "nama_studio"   => $this->nama_studio,
        ];
    }
}
