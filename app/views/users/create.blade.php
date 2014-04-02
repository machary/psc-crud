@extends('layouts.scaffold')

@section('main')

<h1>Create User</h1>

{{ Form::open(array('route' => 'admin.users.store')) }}
	<ul>
        <li>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', Input::old('username'), array('placeholder' => 'your.username')) }}

        </li>
        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', array('placeholder' => 'Min. 5 Character')) }}

        </li>

        <li>
            {{ Form::label('fullname', 'Fullname:') }}
            {{ Form::text('fullname') }}
        </li>

        <li>
            {{ Form::label('phone', 'Phone Number:') }}
            {{ Form::text('phone', Input::old('phone'), array('placeholder' => 'Numeric Only')) }}
        </li>

        <li>
            {{ Form::label('email', 'E-mail:') }}
            {{ Form::text('email',Input::old('email'), array('placeholder' => 'name@youremail.com')) }}
        </li>

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


