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
        $orderkursi = OrderKursi::where('id_kursi', $this->id)->first();

        $order = Order::with(['orderkursi' => function($query) {
            $query->where('id_kursi', $this->id);
        }])->whereDate('tanggal', $request->tanggal)->where('jam', $request->jam)->first();

        /*$order = Order::with(['orderkursis' => function($q) {
            $q->where('id_kursi', $this->id);
        }])->whereDate('tanggal', $request->tanggal)->where('jam', $request->jam)->first();*/

        //$order = Order::whereDate('tanggal', $request->tanggal)->where('jam', $request->jam)->first();

        return [
            'id' => $this->id,
            'nama_kursi' => $this->nama_kursi,
            'is_selected' => $order->orderkursi ? true : false
        ];
    }
}
