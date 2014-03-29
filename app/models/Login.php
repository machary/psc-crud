<?php

class Login extends Eloquent {
    protected $table = 'client_user';
    protected $primaryKey = 'username';

    public static $rules = array(
        'username' => 'required',
        'password' => 'required'
    );

    public function scopeUsername($query,$param)
    {
        return $query->where('username', $param);
    }

    public function scopePass($query,$param)
    {
        return $query->where('password', $param);
    }




}


