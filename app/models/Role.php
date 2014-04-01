<?php

class Role extends Eloquent {
	protected $guarded = array();
    protected $table = 'client_user_role';
    protected $primaryKey = 'role_id';
    public $timestamps = false;
    protected $fillable = array('role_name');

    public static $rules = array(
        'role_name' => 'required'
    );
}
