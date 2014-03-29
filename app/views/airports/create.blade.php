@extends('layouts.scaffold')

@section('main')

<h1>Create Airport</h1>

{{ Form::open(array('route' => 'admin.airports.store')) }}
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


