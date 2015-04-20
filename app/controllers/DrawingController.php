<?php
use Illuminate\Support\MessageBag;
class DrawingController extends BaseController {
	
	public function listDrawing() {
		return View::make('drawing.list',  array('drawings'=>Drawing::all()));
	}
	
	public function drawDrawing($drawing) {
		$drawing = Drawing::find($drawing);
		if(!$drawing){
			throw new NotFoundHttpException("Invalid drawingId");
		}
		if(!$drawing->wins->count()){
			$lottery = range(1, 90);
			shuffle($lottery);
			$lottery = array_slice($lottery, 0, 5);
			foreach($lottery as $number){
				$wining = new Wining;
				$wining->drawing_id = $drawing->id;
				$wining->number = $number;
				$wining->save();
			}
		}
		return Redirect::to('/drawings');
	}
	
	public function generateDrawings() {
		$begin = new DateTime(date("Y-m-d", strtotime('last sunday')));
		$end = new DateTime(date("Y-m-d", strtotime('next sunday')));
		$end = $end->modify( '+52 weeks' ); 

		$interval = new DateInterval('P1W');
		$daterange = new DatePeriod($begin, $interval ,$end);
		foreach($daterange as $date){
			$drawing = Drawing::where('drawing_at', '=', $date->format("Y-m-d H:i:s"))->first();
			if(!$drawing){
				$drawing = new Drawing;
				$drawing->drawing_at = $date->format("Y-m-d H:i:s");
				$drawing->save();
			}
		}
		return Redirect::to('/drawings');
	}

}
