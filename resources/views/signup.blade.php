@extends('layout.master')
@section('content')
<link rel="stylesheet" href="css/StyleSignup.css">
<div class='signup'>
	<h2 class='heading'>Sign-Up</h2>
	<br>
	<form method='post' action='/saving'>
		<input type="hidden" name="_token" value={{ csrf_token() }}>
		<div class='name'>username : <input type='text' name='username' id='username'></div><br>
		<div class='pass'>password : <input type='password' name='pass' id='pass'></div><br>
		<div class='pass_re'>confirm password : <input type='password' name='pass_re' id='pass_re'></div><br><br>
		<div class='buttons'><input type='submit' name='submit' value='Sign Up'>
		<input type='button' name='cancel' value='cancel' onclick='can()'></div>
	</form>	
	@if(count($errors))@foreach ($errors->all() as $error)<div><ul><li>{{$error}}</li></ul></div>@endforeach @endif
	@if(session('err'))<div>{{session('err')}}</div>@endif
</div>
@stop
@section('script')
<script>
function can()
{
	document.getElementById('username').value='';
	document.getElementById('pass').value='';
	document.getElementById('pass_re').value='';
	document.getElementById('email').value='';	
}
</script>
@stop