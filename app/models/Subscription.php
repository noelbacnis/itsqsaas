<?php

class Subscription extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id');

	// protected $fillable = array('name', 'price');

	// protected $fillable = array('client_id', 'subscription_type_id', 'transaction_number', 'total_amount', 'start_period', 'end_period');


	public function clients() {
        return $this->hasMany('Client'); 
    }

    // public function subscriptionsType() {
    //     return $this->belongsTo('SubscriptionsType', 'id', 'subscription_type_id'); 
    // }

}