@extends('layouts.scaffold')
@section('main')

<div id="main" class="container">
<h1>Login</h1>
{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
<!-- if there are login errors, show them here -->
{{ $errors->first('username') }}
{{ $errors->first('password') }}
<div class="form-group">
    {{ Form::label('username', 'Username' , array('class' => 'control-label col-lg-3') ) }}
    <div class="col-lg-9">
        {{ Form::text('username', Input::old('username'), array('placeholder' => 'username..','class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('password', 'Password', array('class' => 'control-label col-lg-3')) }}
    <div class="col-lg-9">
    {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <div class="col-lg-9 col-lg-offset-3">
        {{ Form::submit('Login', array('class' => 'btn btn-lemhannas') ) }}
    </div>
</div>
{{ Form::close() }}
</div>

@stop