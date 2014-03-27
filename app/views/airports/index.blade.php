@extends('layouts.scaffold')

@section('main')

<h1>All Airports</h1>

<p>{{ link_to_route('airports.create', 'Add new airport') }}</p>

@if ($airports->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Airport_code</th>
				<th>Airport_name</th>
				<th>City</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($airports as $airport)
				<tr>
					<td>{{{ $airport->airport_code }}}</td>
					<td>{{{ $airport->airport_name }}}</td>
					<td>{{{ $airport->city }}}</td>
                    <td>{{ link_to_route('airports.edit', 'Edit', array($airport->airport_code), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('airports.destroy', $airport->airport_code))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no airports
@endif

@stop
