@extends('layout.master')
@section('content')
<link rel='stylesheet' href='css/StyleDashBoard.css'>
<form method='post' action='/book_room'>
<input type="hidden" name="_token" value={{ csrf_token() }}>
<input type='submit' value='Book Meeting Room' class='booking'>
<p class='username'>User Name : <?php session_start();echo $_SESSION["username"]; ?></p>
</form>
<form method='get' action='/'>
<input type='submit' value='Logout' class='logout'>
</form>
<div class='dashboard'>
<h2 class='heading'>Dashboard</h2><br>
<table>
  <tr>
    <th>ID</th>
    <th>Room</th>
    <th>From Time</th>
    <th>To Time</th>
    <th>Booked Person</th>
    <th>Purpose</th>
  </tr>
  <tr>
    <td>Row 1: Col 1</td>
    <td>Row 1: Col 2</td>
    <td>Row 1: Col 1</td>
    <td>Row 1: Col 2</td>
    <td>Row 1: Col 1</td>
    <td>Row 1: Col 2</td>
  </tr>
</table>

@stop
@section('script')
@stop