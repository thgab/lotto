<?php

class Tip extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tips';
	public $timestamps = false;
	
	public function ticket()
    {
        return $this->belongsTo('Ticket');
    }

}
