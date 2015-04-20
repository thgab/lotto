<?php

class Ticket extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tickets';
	public $timestamps = false;
	
	public function drawing()
    {
        return $this->belongsTo('Drawing');
    }
	
		
	public function user()
    {
        return $this->belongsTo('User');
    }
	
	public function tips()
    {
        return $this->hasMany('Tip');
    }
	
	public function wins()
    {
		if($this->drawing->wins()->count()) {
			return $this->tips()->whereIn('number',$this->drawing->wins->lists('number'));
		}else{
			return $this->tips()->whereIn('number',array(0));
		}
    }

}
