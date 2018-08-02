<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MeetingRoomBooking extends Controller
{
    public function login() 
    {
        return view('login');
    }
    
    
    public function signUp() 
    {
        return view('signup');
    }
    
    
    public function saving(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'pass'=>'required',
            'pass_re'=>'required|same:pass'
        ],[
            'username.required'=>'username required',
            'pass.required'=>'password required',
            'pass_re.required'=>'confirm the password',
            'pass_re.same'=>'passwords are not matching'
        ]);
        
        
        $username=$request['username'];
        
        session_start();
        $_SESSION["username"] =$username;
        
        $a=Hash::make($request['pass']);
        $b=$request['pass_re'];

        return view('register');

    }
    
    
    public function check(Request $request) 
    {
        echo $request['username'].'<br>';
        echo Hash::make($request['pass']);
    }
    
    
    public function register(Request $request) 
    {
        return $this->dashBoard();
    }
    
    
    public function dashBoard() 
    {   
        return view('dashboard');       
    }
    
    public function bookMeetingRoom(Request $request)
    {
        return view('bookroom');
    }
    
    
}





















