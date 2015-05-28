<?php

class SubscriptionsType extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('name', 'price');

    public function subscriptions() {
        return $this->hasMany('Subscriptions', 'id', 'subscription_type_id'); 
    }

}