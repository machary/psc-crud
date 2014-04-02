@extends('layouts.scaffold')

@section('main')

<h1>All Userroles</h1>

<p>{{ link_to_route('admin.userroles.create', 'Add new userrole') }}</p>

@if ($userroles->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>User_name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($userroles as $userrole)
				<tr>
					<td>{{{ $userrole->user_name }}}</td>
                    <td>{{ link_to_route('admin.userroles.edit', 'Edit', array($userrole->user_name), array('class' => 'btn btn-info')) }}</td>

				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no userroles
@endif

@stop
