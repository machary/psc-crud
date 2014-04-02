<?php

class Userrole extends Eloquent {
	protected $guarded = array();
    protected $table = 'user_role_map';
    protected $primaryKey = 'user_name';
    public $timestamps = false;

	public static $rules = array(
		'user_name' => 'required|Max:32'
	);
}
