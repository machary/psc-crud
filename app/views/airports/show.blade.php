@extends('layouts.scaffold')

@section('main')

<h1>Show Airport</h1>

<p>{{ link_to_route('airports.index', 'Return to all airports') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Airport_code</th>
				<th>Airport_name</th>
				<th>City</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $airport->airport_code }}}</td>
					<td>{{{ $airport->airport_name }}}</td>
					<td>{{{ $airport->city }}}</td>
                    <td>{{ link_to_route('airports.edit', 'Edit', array($airport->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('airports.destroy', $airport->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
