@extends('layouts.scaffold')

@section('main')

<h1>Edit Airport</h1>
{{ Form::model($airport, array('method' => 'PATCH', 'route' => array('airports.update', $airport->airport_code))) }}
	<ul>
        <li>
            {{ Form::label('airport_code', 'Airport_code:') }}
            {{ Form::text('airport_code') }}
        </li>

        <li>
            {{ Form::label('airport_name', 'Airport_name:') }}
            {{ Form::text('airport_name') }}
        </li>

        <li>
            {{ Form::label('city', 'City:') }}
            {{ Form::text('city') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('airports.show', 'Cancel', $airport->airport_code, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
