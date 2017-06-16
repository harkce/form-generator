<!DOCTYPE html>
<html>
<head>
<title>Form Generator | @yield('title')</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@yield('pagestyle')
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Form Generator</a>
		</div>
		<ul class="nav navbar-nav">
			<li @if ($title == 'Categories') class="active" @endif><a href="{{ url('categories') }}"><i class="fa fa-list-ul"></i> Department</a></li>
			<li @if ($title == 'Modules') class="active" @endif><a href="{{ url('modules') }}"><i class="fa fa-paper-plane"></i> KPI</a></li>
			<li @if ($title == 'Forms') class="active" @endif><a href="{{ url('forms') }}"><i class="fa fa-newspaper-o"></i> Form KPI</a></li>
		</ul>
	</div>
</nav>
<div class="container">
	<div class="jumbotron">
		<h2>@yield('title')</h2>
	</div>
	@if (session('status'))
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success">
			  <strong>Success!</strong> {{ session('status') }}
			</div>
		</div>
	</div>
	@endif
	@yield('content')
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('pagescript')
</body>
</html>