@extends('layouts.scaffold')

@section('main')

<h1>All Roles</h1>

<p>{{ link_to_route('admin.roles.create', 'Add new role') }}</p>

@if ($roles->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Role_name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($roles as $role)
				<tr>
					<td>{{{ $role->role_name }}}</td>
                    <td>{{ link_to_route('admin.roles.edit', 'Edit', array($role->role_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.roles.destroy', $role->role_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no roles
@endif

@stop
