@extends('layouts.scaffold')

@section('main')

<h1>Show Airline</h1>

<p>{{ link_to_route('airlines.index', 'Return to all airlines') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Airline_code</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $airline->airline_code }}}</td>
                    <td>{{ link_to_route('airlines.edit', 'Edit', array($airline->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('airlines.destroy', $airline->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
