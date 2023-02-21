<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class UserController extends Controller
{
    function index()
    {
        $users = DB::table('users')->get();
        return view('users.index')->with('users', $users);
    }

    function store(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('user.index');
    }

    function edit($id){
        $user = DB::table('users')->find($id);
        return $user;
    }

    function update(Request $request){
        DB::table('users')->where('id', $request->id)->update([
            'name'=> $request->name,
            'email' => $request->email,
            'password'=> $request->password,
            'is_admin'=> $request->is_admin,
        ]);

        return redirect()->route('user.index');

    }

    function destroy($id){
        // return "delete";
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('user.index');
    }
}
