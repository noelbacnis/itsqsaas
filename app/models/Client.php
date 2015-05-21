<?php

class Client extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('name', 'description', 'tagline', 'image', 'primary_color', 'contact_number', 'address', 'status', 'subscription_id', 'domain');

	public function subscription(){        
		return $this->belongsTo('Subscription'); 
	}

	public function user() {
        return $this->hasOne('User', 'user_id', 'id'); 
    }
}