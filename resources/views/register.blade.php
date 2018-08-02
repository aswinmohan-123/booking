@extends('layout.master')
@section('content')
<link rel='stylesheet' href='css/RegisterStyle.css'>
<div class='register'>
<h2 class='heading'>Register Form</h2>
<form method='post' action="/register">
<input type="hidden" name="_token" value={{ csrf_token() }}>
<div class='first_name'>First name : <input type='text' id='first_name' name='first_name'></div><br>
<div class='last_name'>Last name : <input type='text' id='last_name' name='last_name'></div><br>
<div class='age'>Age : <input type='int' id='age' name='age'></div><br>
<div class='email'>Email : <input type='text' id='email' name='email'></div><br>
<div class='address'>address : <input type='text' id='address' name='address'></div><br>
<div class='buttons'><input type='submit' value='Register'><input type='button' value='Cancel' onclick='can()'></div>
</form>
</div>
@stop
@section('script')
<script>
function can()
{
	document.getElementById('first_name').value='';
	document.getElementById('last_name').value='';
	document.getElementById('age').value='';
	document.getElementById('email').value='';
	document.getElementById('address').value='';
}
</script>
@stop