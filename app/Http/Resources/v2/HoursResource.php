<?php

namespace App\Http\Resources\v2;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HoursResource extends JsonResource
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
            "id"    => $this->id,
            "jam"   => Carbon::parse($this->jam)->format('H:i'),
        ];
    }
}
