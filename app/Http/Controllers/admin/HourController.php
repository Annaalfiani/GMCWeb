<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JamTayang;

class HourController extends Controller
{
	public $hours = [];

    public function all(Request $request)
	{
		$this->setUpHour();
		
		$hours = JamTayang::where('id_film', $request->film_id)
		->where('id_studio', $request->studio_id)->get();
		$res = [];
		foreach ($hours as $hour) {
			array_push($res, $hour->jam);
			// $hour_same = in_array($hour->jam->format('H:i'), $this->hours);
			// if ($hour_same) {
			// 	if(($key = array_search($hour->jam->format('H:i'), $this->hours, true)) !== FALSE) {
			// 		unset($this->hours[$key]);
			// 	}
			// }
		}
		return json_encode($res);
	}

	private function setUpHour()
	{
		$hours = [];
        for ($i = 10; $i <= 22; $i++) {
            if ($i > 9) {
                array_push($hours, $i.':00');
                array_push($hours, $i.':30');
                //$text_hour = ;
            } else {
                array_push($hours, $i.':00');
                array_push($hours, $i.':30');
            }
            //array_push($hours, $text_hour);
        }
		$this->hours = $hours;
	}
}
