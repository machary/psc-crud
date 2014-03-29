@extends('layouts.scaffold')

@section('main')

<h1>All Airlines</h1>

<p>{{ link_to_route('admin.airlines.create', 'Add new airline') }}</p>

@if ($airlines->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Airline Code</th>
                <th>Airline Name</th>
                <th>Blacklist Status</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($airlines as $airline)
				<tr>
					<td>{{{ $airline->airline_code }}}</td>
                    <td>{{{ $airline->airline_name }}}</td>
                    <td>{{{ $airline->blacklisted }}}</td>
                    <td>{{ link_to_route('admin.airlines.edit', 'Edit', array($airline->airline_code), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.airlines.destroy', $airline->airline_code))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no airlines
@endif

@stop
