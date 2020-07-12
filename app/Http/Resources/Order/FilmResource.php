<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            "foto" => $this->foto,
            "judul" => $this->judul,
            "sinopsis" => $this->sinopsis,
            "genre" => $this->genre,
            "status" => $this->status,
            //"jadwaltayang" => new JadwalTayangResource($this->jadwaltayang)
        ];
    }
}
