<?php

class OrdersProduct extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('quantity', 'order_id', 'product_id');

	public function order(){        
		return $this->belongsTo('Order'); 
	}

	public function product(){        
		return $this->belongsTo('Product'); 
	}

}