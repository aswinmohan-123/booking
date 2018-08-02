<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','MeetingRoomBooking@login');

Route::get('/signup','MeetingRoomBooking@signUp');

Route::post('/check','MeetingRoomBooking@check');

Route::post('/saving','MeetingRoomBooking@saving');

Route::get('/saving','MeetingRoomBooking@saving');

Route::post('/register','MeetingRoomBooking@register');

Route::post('/dashboard','MeetingRoomBooking@dashBoard');

Route::post('/book_room','MeetingRoomBooking@bookMeetingRoom');