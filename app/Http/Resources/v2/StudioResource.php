<?php

namespace App\Http\Resources\v2;

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
        return [
            "id"            => $this->id,
            "nama_studio"   => $this->nama_studio,
        ];
    }
}
