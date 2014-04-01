@extends('layouts.scaffold')

@section('main')

<h1>Edit Role</h1>
{{ Form::model($role, array('method' => 'PATCH', 'route' => array('admin.roles.update', $role->role_id))) }}
	<ul>
        <li>
            {{ Form::label('role_name', 'Role_name:') }}
            {{ Form::text('role_name') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('admin.roles.show', 'Cancel', $role->role_id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
