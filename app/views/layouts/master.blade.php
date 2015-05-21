<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Software as a Service</title>
	{{ HTML::style('assets/css/bootstrap.min.css'); }}
	{{ HTML::style('assets/css/bootstrap-theme.min.css'); }}
	{{ HTML::style('assets/css/app.css'); }}
	{{ HTML::style('assets/css/sb-admin.css'); }}
	{{ HTML::style('assets/css/plugins/morris.css'); }}
	{{ HTML::style('assets/fonts/font-awesome/css/font-awesome.min.css'); }}
	{{ HTML::script('assets/js/jquery.min.js'); }}
	{{ HTML::script('assets/js/bootstrap.min.js'); }}
	{{ HTML::script('assets/js/npm.js'); }}

	</head>
<body>
	@yield('content')
</body>
</html>