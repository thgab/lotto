<?php

class Drawing extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'drawings';
	public $timestamps = false;
	
	public function wins()
    {
        return $this->hasMany('Wining');
    }
	
	public function tickets()
    {
        return $this->hasMany('Ticket');
    }

}
