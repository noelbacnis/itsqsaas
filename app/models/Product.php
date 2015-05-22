<?php

class Product extends \Eloquent {

	public static $rules = array(
		'name' => 'required',
		'price' => 'required|numeric',
		'category_id' => 'required'
	);

	public static $messages = array(
		
	);

	public static $friendly_names = array(
		'name' => 'product name',
		'category_id' => 'category'
	);

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('name', 'description', 'price', 'image', 'status', 'category_id');

	public function orderProducts() {
        return $this->hasMany('OrdersProduct', 'id', 'product_id'); 
    }

    public function category() {
        return $this->belongsTo('Category'); 
    }

    

}