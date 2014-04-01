@extends('layouts.scaffold')

@section('main')

<h1>Show Role</h1>

<p>{{ link_to_route('admin.roles.index', 'Return to all roles') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Role_name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $role->role_name }}}</td>
                    <td>{{ link_to_route('admin.roles.edit', 'Edit', array($role->role_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.roles.destroy', $role->role_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
