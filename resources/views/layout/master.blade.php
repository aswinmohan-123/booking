<!doctype html>
<head>
	<title>Meeting Room Booking</title>
	<link rel='stylesheet' href='css/StyleMaster.css'>
</head>
<body>
<h1 class='meeting'>Meeting Room Booking</h1>
<hr>
@yield('content')
	<footer class='footer'>
	<hr>
		<p class='date'>{{date('M d, Y')}}</p>
	</footer>
</body>
@yield('script')