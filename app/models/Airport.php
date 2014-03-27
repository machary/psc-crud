<?php

class Airport extends Eloquent {
	protected $guarded = array();
    protected $table = 'airport';
    protected $primaryKey = 'airport_code';
    public $timestamps = false;
    protected $fillable = array('airport_code', 'airport_name', 'city');
    protected $perPage = 10;

	public static $rules = array(
		'airport_code' => 'required',
		'airport_name' => 'required',
		'city' => 'required'
	);
}
