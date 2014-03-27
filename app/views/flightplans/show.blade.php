@extends('layouts.scaffold')

@section('main')

<h1>Show Flightplan</h1>

<p>{{ link_to_route('flightplans.index', 'Return to all flightplans') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Airline</th>
				<th>Flightnum</th>
				<th>Default_dep_time</th>
				<th>Destination</th>
				<th>Blacklisted</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $flightplan->airline }}}</td>
					<td>{{{ $flightplan->flightnum }}}</td>
					<td>{{{ $flightplan->default_dep_time }}}</td>
					<td>{{{ $flightplan->destination }}}</td>
					<td>{{{ $flightplan->blacklisted }}}</td>
                    <td>{{ link_to_route('flightplans.edit', 'Edit', array($flightplan->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('flightplans.destroy', $flightplan->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
