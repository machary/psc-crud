@extends('layouts.scaffold')

@section('main')

<h1>Edit Airline</h1>
{{ Form::model($airline, array('method' => 'PATCH', 'route' => array('admin.airlines.update', $airline->airline_code))) }}
	<ul>
        <li>
            {{ Form::label('airline_code', 'Airline Code:') }}
            {{ Form::text('airline_code') }}
        </li>

        <li>
            {{ Form::label('airline_name', 'Airline Name:') }}
            {{ Form::text('airline_name') }}
        </li>

        <li>
            {{ Form::label('blacklisted', 'Blacklisted') }}
            {{ Form::select('blacklisted', array('0' => 'Not Blacklist', '1' => 'Blacklist')) }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('admin.airlines.show', 'Cancel', $airline->airline_code, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
