@extends('layouts.master')

@section('content')
<div class="row">
	@if ($errors->first('email') || $errors->first('password'))
	<div class="bs-component">
		<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">×</button>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</div>
	</div>
	@endif

	{{ Form::open(array('url' => 'login','class'=>'form-horizontal')) }}
	<fieldset>
		<legend>Bejelentkezés</legend>
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
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button type="reset" class="btn btn-default">Cancel</button>
				{{ Form::submit('Submit',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>
@stop