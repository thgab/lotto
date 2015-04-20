@extends('layouts.master')

@section('content')
@if($errors->any())
<div class="bs-component">
	<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
		{{ implode(', ', $errors->all(':message')) }}
	</div>
</div>
@endif
<div class="row">
	<div class="col-xs-12">
		<h2>Szelvény a {{ date("Y-m-d",strtotime($ticket->drawing->drawing_at)) }}-i sorsolásra</h2>
	</div>
</div>
{{ Form::open() }}
<div class="row">
	<div class="col-xs-12">
		@foreach ($numbers as $number)
		<div class="item">
			{{ Form::checkbox('lottery[]', $number, isset($tips) && in_array($number,$tips), array('id'=>'lottery'.$number,0=>(isset($winners) ? 'disabled' : 'enabled'))) }}
			{{ Form::label('lottery'.$number, $number, array('class'=>(isset($winners) && in_array($number,$winners) ? 'winner' : ''))) }}
		</div>
		@endforeach
	</div>
</div>
@if (!$ticket->drawing->wins->count())
<div class="form-group">
	<div class="col-lg-10 col-lg-offset-2">
		{{ Form::submit('Megjátszom a szelvényt',array('class'=>'btn btn-primary')) }}
	</div>
</div>
@endif
{{ Form::close() }}
<div class="row">
	<div class="col-xs-12">
		<h2>Magyarázat</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<input id="radio_checked" type="checkbox" checked disabled="disabled"/>
		<label for="radio_checked">{{isset($tips) ? count($tips) : 0}}</label>
		Megjátszott szám
	</div>
	<div class="col-md-4">
		<input id="radio_drawed" type="checkbox" disabled="disabled"/>
		<label for="radio_drawed" class="winner">{{isset($winners) ? count($winners) : 0}}</label>
		Kisorsolt szám
	</div>
	<div class="col-md-4">
		<input id="radio_wined" type="checkbox" checked disabled="disabled"/>
		<label for="radio_wined" class="winner">{{$ticket->wins->count()}}</label>
		Eltalált szám
	</div>
</div>

@stop

