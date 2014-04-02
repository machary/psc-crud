<?php

class User extends Eloquent {
	protected $guarded = array();
    protected $table = 'client_user';
    protected $primaryKey = 'username';
    public $timestamps = false;
    protected $fillable = array('username', 'password', 'fullname', 'phone', 'email');

    public static $rules = array(
        'username' => 'required|Max:32',
        'password' => 'required|Min:5',
        'fullname' => 'required|Max:128',
        'phone'    => 'numeric',
        'email'    => 'email'

    );
}
