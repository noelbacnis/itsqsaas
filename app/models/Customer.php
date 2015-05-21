<?php

class Customer extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('last_name', 'firstname', 'gender', 'status', 'del_contact_number', 'del_address_number', 'del_address_baranggay', 'del_address_municipal', 'del_address_province');

	public function orders() {
        return $this->hasMany('Order'); 
    }

}