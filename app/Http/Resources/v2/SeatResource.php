<?php

namespace App\Http\Resources\v2;

use App\Kursi;
use App\OrderDetails;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
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
        $result_seat = [];
        $counter = 0;
        foreach ($seats as $value) {
            $explode = explode("-", $value->nama_kursi);
            array_push($seat, $explode);

            $order = OrderDetails::whereHas('order', function ($query) use($request){
               $query->whereDate('tanggal', $request->tanggal)->where('jam', $request->jam)
                ->where('id_film', $request->id_film)->where('id_studio', $request->id_studio);
            })->where('id_kursi', $value->id)->first();

            if ($order){
                $item = [
                    'id' => $value->id,
                    'nama_kursi' => $value->nama_kursi,
                    'status' => $order ? "booked" : "available",
                ];

            }else{
                $counter++;
                $item = [
                    'id' => $value->id,
                    'nama_kursi' => $value->nama_kursi,
                    'status' => "available",
                ];
            }
            array_push($result_seat, $item);
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
            "empty_seat" => $counter,
            "seats" => $result_seat,
        ];
    }
}
