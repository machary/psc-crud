@extends('layouts.scaffold')

@section('main')

<h1>Create Airline</h1>

{{ Form::open(array('route' => 'airlines.store')) }}
	<ul>
        <li>
            {{ Form::label('airline_code', 'Airline Code:') }}
            {{ Form::text('airline_code') }}
        </li>

        <li>
            {{ Form::label('airline_name', 'Airline name') }}
            {{ Form::text('airline_name') }}
        </li>

        <li>
            {{ Form::label('blacklisted', 'Blacklisted') }}
            {{ Form::select('blacklisted', array('FALSE' => 'Not Blacklist', 'TRUE' => 'Blacklist')) }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


