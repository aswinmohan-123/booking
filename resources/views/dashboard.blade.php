@extends('layout.master')
@section('content')
<link rel='stylesheet' href='css/StyleDashBoard.css'>
<form method='post' action='/book_room'>
<input type="hidden" name="_token" value={{ csrf_token() }}>
<select class='room_select' onchange='selection(this.value)'><option selected="true" disabled="disabled">--------SELECT ROOM--------</option>@foreach ($rooms as $room)<option value={{$room->id}}>{{$room->room_name}}</option>@endforeach</select>
<input type='submit' value='Book Meeting Room' class='booking'>
</form>
<p class='username'>User Name : <?php echo $_SESSION["username"]; ?></p>
<form method='get' action='/'>
<input type='submit' value='Logout' class='logout'>
</form>
<div class='dashboard'>
<h2 class='heading'>Dashboard</h2><br>
<table id='table'>
</table>

@stop
@section('script')
<script type="text/javascript">
dat= "<tr><th>ID</th><th>Room</th><th>From Time</th><th>To Time</th><th>Booked Person</th><th>Purpose</th></tr>";
document.getElementById('table').innerHTML=dat;
function selection(value) {
	values="<tr><td>Row 1: Col 1</td><td>Row 1: Col 2</td><td>Row 1: Col 1</td><td>Row 1: Col 2</td><td>Row 1: Col 1</td><td>Row 1: Col 2</td></tr>";
	document.getElementById('table').innerHTML=dat+values;
}




</script>
@stop