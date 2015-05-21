<?php

class Product extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('name', 'description', 'price', 'image', 'status', 'categories_id');

	public function orderProducts() {
        return $this->hasMany('OrdersProduct', 'id', 'product_id'); 
    }

    public function category() {
        return $this->belongsTo('Category'); 
    }

}