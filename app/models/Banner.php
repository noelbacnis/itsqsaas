<?php

class Banner extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = array('client_id', 'filename', 'status');

	public function client() {
        return $this->belongsTo('Client'); 
    }

}