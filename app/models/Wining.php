<?php

class Wining extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'winings';
	public $timestamps = false;
	
	public function drawing()
    {
        return $this->belongsTo('Drawing');
    }


}
