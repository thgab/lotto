<?php
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LotteryController extends BaseController {
	
	public function listLottery($drawingId = 0) {
		$model = Auth::user()->tickets();
		if($drawingId){
			$data['drawing'] = Drawing::find($drawingId);
			$model->where('drawing_id', '=', $drawingId);
		}
		$data['tickets'] = $model->get();
		return View::make('lottery.list', $data);
	}
	
	public function getLottery($ticketId) {
		$userId = Auth::user()->id;
		$data['numbers'] = range(1, 90);
		$ticket = Ticket::find($ticketId);
		if(!$ticket || $ticket->user->id != $userId){
			throw new NotFoundHttpException("Invalid ticketId");
		}
		$tips = $ticket->tips->toArray();
		foreach($tips as $tip){
			$data['tips'][] = $tip['number'];
		}
		$wins = $ticket->drawing->wins->toArray();
		foreach($wins as $win){
			$data['winners'][] = $win['number'];
		}
		$data['ticket'] = $ticket;
		return View::make('lottery.view', $data);
	}
	
	public function postLottery($ticketId) {
		$userId = Auth::user()->id;
		$data['numbers'] = range(1, 90);
		$ticket = Ticket::find($ticketId);
		if(!$ticket || $ticket->user->id != $userId){
			return Redirect::to('/lottery/'.$ticketId);
		}
		if($ticket->drawing->wins()->count()){
			$errors = new MessageBag(['ticket' => ['Ez a szelvény már nem módosítható']]);
			return Redirect::to('/lottery/'.$ticketId)->withErrors($errors);
		}
		$lottery = Input::only(
			'lottery'
		)['lottery'];
		$error = false;
		if(is_array($lottery)){
			$lottery = array_filter(array_unique(array_map('intval',$lottery)),function($tip)use($data){return in_array($tip,$data['numbers']);});
			if(count($lottery)==5){
				$tips = $ticket->tips()->delete();
				foreach($lottery as $number){
					$tip = new Tip;
					$tip->ticket_id = $ticket->id;
					$tip->number = $number;
					$tip->save();
				}
			}else{
				$error = true;
			}
		}else{
			$error = true;
		}
		if($error){
			$errors = new MessageBag(['ticket' => ['Öt számot kell megjátszania 1-től 90-ig']]);
			return Redirect::to('/lottery/'.$ticketId)->withErrors($errors)->withInput(Input::only('lottery'));
		}
		return Redirect::to('/lotteries/'.$ticket->drawing->id);
	}
	
	public function setLottery($drawingId) {
		$drawing = Drawing::find($drawingId);
		if(!$drawing || $drawing->wins()->count()){
			throw new NotFoundHttpException("Invalid drawingId");
		}
		$ticket = new Ticket;
		$ticket->drawing_id = $drawingId;
		$ticket->user_id = Auth::user()->id;
		$ticket->save();
		return Redirect::to('/lottery/'.$ticket->id);
	}
}
