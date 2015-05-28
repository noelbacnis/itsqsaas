<?php

class Order extends \Eloquent {

	public static $rules = array(
		'last_name' => 'required',
		'first_name' => 'required',
		'email' => 'required',
		'cash' => 'required|numeric',
		'del_contact_number' => 'required',
		'del_address_number' => 'required',
		'del_address_baranggay' => 'required',
		'del_address_municipal' => 'required',
		'del_address_province' => 'required',
	);

	public static $messages = array(
		
	);

	public static $friendly_names = array(
		'last_name' => 'last name',
		'first_name' => 'first name',
		'email' => 'email',
		'cash' => 'change for',
		'del_contact_number' => 'contact number',
		'del_address_number' => 'address number',
		'del_address_baranggay' => 'baranggay',
		'del_address_municipal' => 'municipal',
		'del_address_province' => 'province',
	);

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('total', 'cash', 'customer_id', 'del_contact_number', 'del_address_number', 'del_address_baranggay', 'del_address_municipal', 'del_address_province', 'del_message', 'status', 'client_id', 'registered', 'guest_hash', 'first_name', 'last_name', 'email');

	public function orderProducts() {
        return $this->hasMany('OrdersProduct'); 
    }

    public function customer(){        
		return $this->belongsTo('Customer'); 
	}

}