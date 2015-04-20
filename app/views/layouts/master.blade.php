<!DOCTYPE html>
<html lang="en" ng-app="thgabPage">
	<head>
		<meta charset="utf-8">
		<title>elit lottery</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="elit lottery" name="description">
		<meta content="thgab" name="author">
		<!--
		  link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		  <link href="/bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet"
		-->
		<link href="//bootswatch.com/cosmo/bootstrap.min.css" rel="stylesheet">
		<link href="//bootswatch.com/assets/css/bootswatch.min.css" rel="stylesheet">
		<link href="/css/style.css" media="all" rel="stylesheet" type="text/css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">Elit Lottó</a>
					<button class="navbar-toggle" data-target="#navbar-main" data-toggle="collapse" type="button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse collapse" id="navbar-main">
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::user())
							@include('nav.navbar')
						@else
							@include('nav.guestbar')
						@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			@yield('content')
		</div>
		<script src="/js/lottery.js"></script>
	</body>
</html>