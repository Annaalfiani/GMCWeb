<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TanggalTayang;
use Carbon\Carbon;

class TanggalTayangController extends Controller
{
    public function getByStudio($studio_id)
	{
		$dates = TanggalTayang::where('id_studio', $studio_id)->get()->pluck('tanggal');
		$res = [];
		foreach ($dates as $date) {
			$d = Carbon::parse($date)->format('m/d/Y');
			array_push($res, $d);
		}
		return json_encode($res);
	}
}
