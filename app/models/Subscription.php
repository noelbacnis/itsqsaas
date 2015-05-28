<?php

class Subscription extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id');
	// protected $fillable = array('name', 'price');

	public function clients() {
        return $this->hasMany('Client'); 
    }

}