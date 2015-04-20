@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h2>Sorsolások</h2>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="bs-component">
			<ul class="list-group">
				@foreach ($drawings as $draw)
				<li class="list-group-item">
					<span class="badge">{{{$draw->tickets()->where('user_id','=',Auth::user()->id)->count()}}}</span>
					<a href="/lotteries/{{{$draw->id}}}">{{ date("Y-m-d",strtotime($draw->drawing_at)) }}</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@stop

