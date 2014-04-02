@extends('layouts.scaffold')

@section('main')

<h1>Create Userrole</h1>

{{ Form::open(array('route' => 'admin.userroles.store')) }}
	<ul>
        <li>
            {{ Form::label('user_name', 'User_name:') }}
            {{ Form::select('user_name',$user_options, Input::old('user_options')) }}
        </li>

        @foreach($categories as $val)
        <li>
            {{ Form::checkbox('categories[]',$val, false, ['style' => 'float:left;width:25px;']) }}
            {{ Form::label($val) }}
        </li>
        @endforeach

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


