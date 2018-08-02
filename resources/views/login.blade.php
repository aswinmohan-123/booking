@extends('layout.master')
@section('content')
<link rel='stylesheet' href='css/StyleLogin.css'>
<div class='loggin'>
	<h2 class='heading'>Log-in</h2><br>
	<form method='post' action='/check'>
	<input type="hidden" name="_token" value={{ csrf_token() }}>
		<div class='name'>username : <input type='text' name='username' id='username'></div><br>
		<div class='pass'>password : <input type='password' name='pass' id='pass'></div><br><br>
		<div class='buttons'><input type='submit' value='Log-in'>
			<input type='button' name='cancel' value='cancel' onclick='can()'></div>
	</form>
	<a href='/signup'>
		<div class='signup'>
			<input type='submit' name='signup' value='Sign Up'>
		</div>
	</a>
</div>
@stop
@section('script')
<script>
function can()
{
	document.getElementById('username').value='';
	document.getElementById('pass').value='';
}
</script>
@stop