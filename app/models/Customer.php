<?php

class Customer extends \Eloquent {

	public static $rules = array(
		'last_name' => 'required',
		'first_name' => 'required',
		'gender' => 'required',
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
		'del_contact_number' => 'contact number',
		'del_address_number' => 'address number',
		'del_address_baranggay' => 'baranggay',
		'del_address_municipal' => 'municipal',
		'del_address_province' => 'province',
	);

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('last_name', 'first_name', 'gender', 'status', 'del_contact_number', 'del_address_number', 'del_address_baranggay', 'del_address_municipal', 'del_address_province', 'client_id');

	public function orders() {
        return $this->hasMany('Order'); 
    }

    public function user() {
        return $this->hasOne('User', 'foreign_id', 'id'); 
    }

}