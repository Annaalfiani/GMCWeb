<?php

namespace App\Http\Resources;

use App\Order;
use App\OrderKursi;
use Illuminate\Http\Resources\Json\JsonResource;

class KursiAvailableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $order = Order::whereDate('tanggal', $request->tanggal)->where('jam', $request->jam)
            ->where('id_film', $request->id_film)->where('id_studio', $request->id_studio)
            ->where('id_kursi', $this->id)
            ->first();

        if ($order) {
            return [
                'id' => $this->id,
                'nama_kursi' => $this->nama_kursi,
                'status' => $order ? "booked" : "available",
            ];
        }else{
            return [
                'id' => $this->id,
                'nama_kursi' => $this->nama_kursi,
                'status' => "available",
            ];
        }

    }
}
