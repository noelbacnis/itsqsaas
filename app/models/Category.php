<?php

class Category extends \Eloquent {

	// Don't forget to fill this array
	protected $guarded = array('id');
	protected $fillable = array('name', 'client_id');

	public static $rules = array(
		'name' => 'required'
	);

	public static $messages = array(
		
	);

	public static $friendly_names = array(
		'name' => 'category name'
	);


	public function products() {
        return $this->hasMany('Product'); 
    }

    public function scopeActiveProducts($query){
		return Product::where('status','=', 'ACTIVE');
	}

}