<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\User;
use App\YourPassword;
use App\Mail\ResetPassword;


class UserController extends Controller
{    
       
    public function register(Request $request ) {
        if(isset($request)) {       
            $request->validate([
                'name' => 'bail|required|min:3',
                'email' => 'bail|required|string|email|unique:users',
                'password' => 'bail|required|min:8|max:15|confirmed',
                'gender' => 'bail|string'
            ]);
            $user = new User;                
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'image' => $user->imgUpload($request,$request->file('user_image')),
                'api_token' => Str::random(60)
            ]);
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
                $user->update(['active_status' => true]);
            }; 
            $user->yourPass()->create([
                'password' => $request->password
            ]);
            
            return redirect('/');
        }        
    }

    public function login(Request $request) {
        if(isset($request)) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);
            $credentials = $request->only('email','password');
            if(Auth::attempt($credentials)) {
                User::where('id',Auth::id())->update(['active_status' => true]);
                $request->session()->flash('status','logged in successfully !');
                return redirect()->intended();
           }else {
               return back();           
            }
        }
    }
    
    
    public function passwordReset(Request $request){
        if(isset($request)) {
            $request->validate([
                'email' => 'bail|required|string|email',
                'pass1' => 'bail|required|min:6',
                'pass2' => 'bail|required|min:6',
                ]);
            $user = User::where('email',$request->email)->first();
            if($user && $request->pass1 === $request->pass2) {
                $user->update(['password' => Hash::make($request->pass1)]);
                $user->yourPass()->update(['password' => $request->pass1]);                    
                Mail::to($request->email)->send(new ResetPassword($request->pass1));                
            }else {
                return back()->with(['status' => 'a user  with this email doesnt exist.']);
            }
        }    
        return view('index');
    }
    
    public function account (Request $request) {
        return view('account');
    }
    
    public function update(Request $request) {
        $user = Auth::user();
        if(isset($request->change_cred)) {

            if(!is_null($request->name)) {
                $request->validate(['name' => 'string|min:3']);
            }
            if(!is_null($request->email)) {
                $request->validate(['email' => 'string|email|unique:users']);
            }
            if($request->hasFile('userImg')) {
                $request->validate(['userImg' => 'mimes:jpg,png,jpeg']);
            }
            
            $arr = [];
            $data = $request->except(['_token','userImg']);
            if(!is_null($request->file('userImg'))) {
                $arr['image'] = $user->imgUpload($request,$request->file('userImg'));
            }
            foreach($data as $k => $item) {
                if(!is_null($item)) {
                    $arr[$k] = $item;
                }
            }
            $user->update($arr);
        }
        if(isset($request->password)) {
            $request->validate([
                'password' => 'required|min:8|max:15|confirmed'
                ]);
                $user->update(['password' => Hash::make($request->password)]);
                $user->yourPass()->update(['password' => $request->password]);
                $request->session()->flash('status','Password has been successfully changed.');
            }
        return redirect()->back();
    }
    
    public function logout() {
        User::where('id',Auth::id())->update(['active_status' => false]);
        Auth::logout();
        return redirect('/');
    }

}