<?php

namespace App\Http\Resources\v2;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SchedulleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $day = Carbon::parse($this->tanggal)->format('l');
        if($day == 'Saturday' || $day == 'Sunday'){
            $harga = $this->schedulle->harga_weekend;
        }else{
            //dd($this->schedulle);
            $harga = $this->schedulle->harga;
        }
        return [
            //"id"        => $this->id,
            "tanggal"   => Carbon::parse($this->tanggal)->format('Y-m-d'),
            "harga"     => $harga
        ];
    }
}
