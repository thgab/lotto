@extends('layouts.master')

@section('content')
<div class="row">
	@if (Session::has('error'))
        <div class="bs-component">
			<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">×</button>
				{{ Session::get('error') }}
			</div>
		</div>
    @endif
	{{ Form::open(array('class'=>'form-horizontal')) }}
	<input type="hidden" name="token" value="{{ $token }}">
	<fieldset>
		<legend>Új jelszó megadása</legend>
		<div class="form-group{{ $errors->first('email')?' has-error':'' }}">
			{{ Form::label('email', 'Email cím', array('class'=>'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com', 'class'=>'form-control')) }}
			</div>
		</div>
		<div class="form-group{{ $errors->first('password')?' has-error':'' }}">
			{{ Form::label('password', 'Jelszó', array('class'=>'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::password('password',array('class'=>'form-control','placeholder'=>'jelszó')) }}
			</div>
		</div>
		<div class="form-group{{ $errors->first('password_confirmation')?' has-error':'' }}">
			{{ Form::label('password_confirmation', 'Jelszó ismétlése', array('class'=>'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>'jelszó')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				{{ HTML::link('/', 'Cancel', array('class' => 'btn btn-deault')) }}
				{{ Form::submit('Submit',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>
@stop
