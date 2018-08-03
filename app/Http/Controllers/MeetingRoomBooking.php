<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Room;

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
        
        $user=new User();
        $username=$request['username'];
        
        if ($user::select('id')->where('username',$username)->count() > 0) {
            return back()->with('err','username already exist, select another one');
        } else {
            
            $password=Hash::make($request['pass']);
            
            $user->username=$username;
            $user->password=$password;
            $user->first_name='NILL';
            $user->last_name='NILL';
            $user->age=0;
            $user->email='NILL';
            $user->address='NILL';
            $user->role_id=2;
            $user->save();
            
            $user_id=$user::select('id')->orderBy('id','desc')->first();
            
            
            return redirect('/registershow')->with('username',$username)->with('user_id',$user_id);
        }
        

    }
    public function registerShow() {
        session_start();
        $_SESSION['username']=session('username');
        $_SESSION['user_id']=session('user_id');
        return view('register');
    }
    
    
    public function check(Request $request) 
    {
        $user=new User();
        
        $username=$request['username'];
        $password=$request['pass'];
        
        if($user::select('id')->where('username',$username)->count() > 0) {
            $user_data=$user::select('id','password')->where('username',$username)->get();
            
            if(Hash::check($password, $user_data[0]->password)) {
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['user_id']=$user_data[0]->id;
                return $this->dashBoard();
                
            } else {
                return back()->with('error','wrong password');
            }
        } else {
            return back()->with('error','username is not exist');
        }
    }
    
    
    public function register(Request $request) 
    {
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'age'=>'required|numeric',
            'email'=>'required',
            'address'=>'required',
        ],[
            'first_name.required'=>'Please Enter First Name',
            'last_name.required'=>'Please Enter Last Name',
            'age.required'=>'Please Enter Age',
            'age.numeric'=>'Please Enter valid age',
            'email.required'=>'Please Enter Email',
            'address.required'=>'Please Enter Address'
        ]);
        session_start();
        if($_SESSION['user_id']!='') {
        $user=new User();
        $updation=['first_name'=>$request['first_name'],'last_name'=>$request['last_name']
                   ,'age'=>$request['age'],'email'=>$request['email']
                   ,'address'=>$request['address']
        ];
        session_start();
        $user::where('id',$_SESSION['user_id'])->update($updation);
        
        
        return $this->dashBoard();
        
        } else {
            return back()->with('err','invalid user');
        }
    }
    
    
    public function dashBoard() 
    {   
        $room=new Room();
        
        $rooms=$room::select('id','room_name')->get();
        
        
        return view('dashboard')->with('rooms',$rooms);       
    }
    
    public function bookMeetingRoom(Request $request)
    {
        return view('bookroom');
    }
    
    
}





















