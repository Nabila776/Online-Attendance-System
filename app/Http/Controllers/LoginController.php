<?php

namespace App\Http\Controllers;

use App\Models\FirstLoginInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function checkUser(Request $request)
    {
       // dd($request->all());
        // return redirect()->route('home.page');
        $users = User::where('username',$request->username)->first();

        // check if user is not null
        if($users == null){
            // no user found
            return redirect()->back();
        }
        // check user active
        if($users->status!='A'){
            // this user is not active yet
            return redirect()->back();
        }
        // password check
        if(!Hash::check($request->password, $users->password)){

            return redirect()->back();
        }


        Session::put('user_id',$users->id);
        $logininfo=FirstLoginInfo::where('user_id',$users->id)->first();

       // dd( $logininfo);
        if($logininfo == null)
        {
            $$logininfo=FirstLoginInfo::create([
                'user_id' => $users->id,
            ]);
           // dd($logininfo);
            return redirect()->route('updatePassword.index',compact('users'));
        }
        else{
           // dd($logininfo);
            if($users->role_id!=1)
            {
                return redirect()->route('student.index');
            }
            else{
                return redirect()->route('faculty.index');
            }
        }



    }
}
