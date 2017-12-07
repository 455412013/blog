<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',['except'=>'destroy']);
    }

    public function create()
    {
        return view('session.create');
    }


    public function store(Request $request)
    {
        //Attempt to authenticate the user.
        if (!auth()->attempt(\request(['email','password']))){
            return redirect()->back()->withErrors('please check your credentials');
        }

        return redirect('/');

        //If not,redirect back


        //If so ,sign them in.


        //Redirect
        
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
