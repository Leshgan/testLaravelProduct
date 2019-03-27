<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="container">
        @yield('content')
    </div>
    
</body>
</html>