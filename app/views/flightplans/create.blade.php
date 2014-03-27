@extends('layouts.scaffold')

@section('main')

<h1>Create Flightplan</h1>

{{ Form::open(array('route' => 'flightplans.store')) }}
	<ul>
        <li>
            {{ Form::label('airline', 'Airline:') }}
            {{ Form::select('airline',$airline_options, Input::old('airline_options')) }}
        </li>

        <li>
            {{ Form::label('flightnum', 'Flightnum:') }}
            {{ Form::text('flightnum') }}
        </li>

        <li>
            {{ Form::label('default_dep_time', 'Default Departure Time:') }}
            {{ Form::text('default_dep_time') }}
        </li>

        <li>
            {{ Form::label('destination', 'Destination:') }}
            {{ Form::select('destination',$airport_options, Input::old('airport_options')) }}
        </li>

        <li>
            {{ Form::label('blacklisted', 'Blacklisted:') }}
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


