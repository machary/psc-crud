@extends('layouts.scaffold')

@section('main')

<h1>Edit Userrole</h1>
{{ Form::model($userrole, array('method' => 'PATCH', 'route' => array('admin.userroles.update', $userrole->user_name))) }}
	<ul>
        <li>
            {{ Form::label('user_name', 'User Name:') }}
            {{ Form::text('user_name',null,array('disabled')) }}
        </li>

        <li>
            {{ Form::label('role_name', 'Role Categories :') }}
        </li>
        @foreach($categories as $val)
        <li>
            @if(in_array($val, $selected_role))

                {{ Form::checkbox('categories[]',$val, true, ['style' => 'float:left;width:25px;']) }}
                {{ Form::label($val) }}

            @else
                {{ Form::checkbox('categories[]',$val, false, ['style' => 'float:left;width:25px;']) }}
                {{ Form::label($val) }}
            @endif
        </li>
        @endforeach

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('admin.userroles.show', 'Cancel', $userrole->user_name, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
