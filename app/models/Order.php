<?php

class Order extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('total', 'cash', 'customer_id', 'del_to', 'del_contact_number', 'del_address_number', 'del_address_baranggay', 'del_address_municipal', 'del_address_province', 'del_message', 'status', 'client_id', 'registered');

	public function orderProducts() {
        return $this->hasMany('OrdersProduct', 'id', 'order_id'); 
    }

    public function customer(){        
		return $this->belongsTo('Customer'); 
	}

}