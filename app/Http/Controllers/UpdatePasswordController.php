<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UpdatePasswordController extends Controller
{
    public function index(User $users)
    {
       // $users=Session::get('user_id');
        return view('updatePassword',compact('users'));
    }
    public function updates(Request $request,User $users)
    {
        // $users=Session::get('user_id');
       // dd($users);
        $users->update([
            'password'=>Hash::make($request->password)
        ]);
        //dd($users);
        if($users->role_id!=1)
        {
            return redirect()->route('student.index');
        }
        else{
            return redirect()->route('faculty.index');
        }
    }

}
