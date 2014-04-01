<?php

class User extends Eloquent {
	protected $guarded = array();
    protected $table = 'client_user';
    protected $primaryKey = 'username';
    public $timestamps = false;

    public static $rules = array(
        'username' => 'required|Max:32',
        'password' => 'required|Min:5',
        'role_id'  => 'required',
        'fullname' => 'required|Max:128',
        'phone'    => 'numeric',
        'email'    => 'email'

    );
}
