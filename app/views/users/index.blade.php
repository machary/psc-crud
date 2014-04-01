@extends('layouts.scaffold')

@section('main')

<h1>All Users</h1>

<p>{{ link_to_route('admin.users.create', 'Add new user') }}</p>

@if ($users->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Username</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{{ $user->username }}}</td>
                    <td>{{ link_to_route('admin.users.edit', 'Edit', array($user->username), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->username))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no users
@endif

@stop
