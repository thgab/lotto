@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h2>Szelvények {{ (isset($drawing)) ? date("Y-m-d",strtotime($drawing->drawing_at)) : "" }}</h2>
		@if(isset($drawing) && !$drawing->wins->count())
		<div class="btn-group-vertical">
			<a href="/lottery/add/{{{$drawing->id}}}" class="btn btn-primary">Új szelvény erre a sorsolásra</a>
		</div>
		@endif
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="bs-component">
			<ul class="list-group">
				@foreach ($tickets as $ticket)
				<li class="list-group-item">
					<span class="badge">{{$ticket->wins->count()}}</span>
					<a href="/lottery/{{{$ticket->id}}}">{{date("Y-m-d",strtotime($ticket->drawing->drawing_at))}}</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@stop

