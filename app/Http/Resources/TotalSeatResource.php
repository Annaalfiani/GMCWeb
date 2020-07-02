<?php

namespace App\Http\Resources;

use App\Kursi;
use Illuminate\Http\Resources\Json\JsonResource;

class TotalSeatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $seats = Kursi::where('id_studio', $this->id)->get();
        $seat = [];
        foreach ($seats as $key => $value) {
            $explode = explode("-", $value->nama_kursi);
            array_push($seat, $explode);
        }

        //column
        $arr_column = array_column($seat, '0');
        $total_column = (integer)max($arr_column);

        //row
        $alphabet = range('A', 'Z');
        $arr_row = array_column($seat, '1');
        $max_row = max($arr_row);
        $arr_search = array_search($max_row, $alphabet);
        $total_row = $arr_search + 1;

        return [
            "total_columns" => $total_column,
            "total_rows" => $total_row,
            'seats' => KursiAvailableResource::collection($this->kursi)
        ];
    }
}
