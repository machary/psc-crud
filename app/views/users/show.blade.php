@extends('layouts.scaffold')

@section('main')

<h1>Show User</h1>

<p>{{ link_to_route('admin.users.index', 'Return to all users') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Username</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $user->username }}}</td>
                    <td>{{ link_to_route('admin.users.edit', 'Edit', array($user->username), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->username))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
