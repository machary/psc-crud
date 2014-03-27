<?php

class Flightplan extends Eloquent {
    protected $guarded = array();
    protected $table = 'flight_plan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('airline', 'flightnum', 'default_dep_time', 'destination', 'blacklisted');
    protected $perPage = 10;


    public static $rules = array(
		'airline' => 'Required|Max:3',
		'flightnum' => 'Required|Max:4',
		'default_dep_time' => 'required|Max:4',
		'destination' => 'Required|max:3',
		'blacklisted' => 'required'
	);
}
