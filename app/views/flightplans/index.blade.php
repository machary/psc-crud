@extends('layouts.scaffold')

@section('main')

<h1>All Flightplans</h1>

<p>{{ link_to_route('admin.flightplans.create', 'Add new flightplan') }}</p>

@if ($flightplans->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Airline</th>
				<th>Flightnum</th>
				<th>Default Departure Time</th>
				<th>Destination</th>
				<th>Blacklisted</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($flightplans as $flightplan)
				<tr>
					<td>{{{ $flightplan->airline }}}</td>
					<td>{{{ $flightplan->flightnum }}}</td>
					<td>{{{ $flightplan->default_dep_time }}}</td>
					<td>{{{ $flightplan->destination }}}</td>
					<td>{{{ $flightplan->blacklisted }}}</td>
                    <td>{{ link_to_route('admin.flightplans.edit', 'Edit', array($flightplan->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.flightplans.destroy', $flightplan->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no flightplans
@endif

@stop
