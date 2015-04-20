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
    @elseif (Session::has('status'))
	    <div class="bs-component">
			<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				{{ Session::get('status') }}
			</div>
		</div>
    @endif
	{{ Form::open(array('class'=>'form-horizontal')) }}
	<fieldset>
		<legend>Jelszóemlékeztető kérése</legend>
		<div class="form-group{{ $errors->first('email')?' has-error':'' }}">
			{{ Form::label('email', 'Email cím', array('class'=>'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com', 'class'=>'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				{{ HTML::link('/', 'Cancel', array('class' => 'btn btn-deault')) }}
				{{ Form::submit('Reset',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>
@stop
