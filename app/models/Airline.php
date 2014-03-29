<?php


class Airline extends Eloquent {
    protected $table = 'airline';
    protected $primaryKey = 'airline_code';
    public $timestamps = false;
    protected $fillable = array('airline_code', 'airline_name', 'blacklisted');

	public static $rules = array(
		'airline_code' => 'required|Max:3',
        'airline_name' => 'required'
	);
}
