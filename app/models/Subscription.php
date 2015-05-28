<?php

class Subscription extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id');
<<<<<<< HEAD
	// protected $fillable = array('name', 'price');
=======
	protected $fillable = array('client_id', 'subscription_type_id', 'transaction_number', 'total_amount', 'start_period', 'end_period');
>>>>>>> 464bc7fd9a9b3dc672c030b0a4ebe4beb83238c7

	public function clients() {
        return $this->hasMany('Client'); 
    }

    public function subscriptionsType() {
        return $this->hasMany('SubscriptionsType', 'id', 'subscription_type_id'); 
    }

}