<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return route('user.index');
    }
    public function login(Request  $request)
    {

        if(session()->has('user')){
            // $user_id = session()->get('user')->id;
            return redirect()->route('user.index');
        }
        if($request->_token){
            $user = DB::table('users')->where([
                'username' => $request->username,
                'password' => $request->password,
            ])->first();

            if($user){
                session()->put('user', $user);
                return redirect()->route('user.index');
            }else{
                return redirect()->back()->withInput()->with('message', 'Incorrect username or password');
            }
        }
        return view('users.login');
    }
    public function logout()
    {
        if(session()->has('user')){
            session()->forget('user');
            return redirect()->route('user.login');
        }
        return redirect()->back();
    }
}
