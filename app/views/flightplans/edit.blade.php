@extends('layouts.scaffold')

@section('main')

<h1>Edit Flightplan</h1>
{{ Form::model($flightplan, array('method' => 'PATCH', 'route' => array('flightplans.update', $flightplan->id))) }}
	<ul>
        <li>
            {{ Form::label('airline', 'Airline:') }}
            {{ Form::text('airline') }}
        </li>

        <li>
            {{ Form::label('flightnum', 'Flightnum:') }}
            {{ Form::text('flightnum') }}
        </li>

        <li>
            {{ Form::label('default_dep_time', 'Default_dep_time:') }}
            {{ Form::text('default_dep_time') }}
        </li>

        <li>
            {{ Form::label('destination', 'Destination:') }}
            {{ Form::text('destination') }}
        </li>

        <li>
            {{ Form::label('blacklisted', 'Blacklisted:') }}
            {{ Form::select('blacklisted', array('0' => 'Not Blacklist', '1' => 'Blacklist')) }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('flightplans.show', 'Cancel', $flightplan->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
