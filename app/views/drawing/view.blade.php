@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h2>Szelvény {{ (isset($drawing)) ? date("Y-m-d",strtotime($drawing->drawing_at)) : "" }}</h2>
	</div>
</div>
<div class="row">

</div>

@stop

