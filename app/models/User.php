<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $guarded = array('id');
	protected $fillable = array('username', 'password', 'remember_token', 'foreign_id', 'user_type');

	public static $rules = array(
		'username' => 'required|unique:users',
		'password' => 'required'
	);

	public static $messages = array(
		
	);

	public static $friendly_names = array(
		'username' => 'email',
		'password' => 'password'
	);

	public function client() {
        return $this->hasOne('Client', 'id', 'foreign_id'); 
    }

    public function customer() {
        return $this->hasOne('Customer', 'id', 'foreign_id'); 
    }

}
