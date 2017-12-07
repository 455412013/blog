<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');

    }

    public function store()
    {
        //Validate the form.

        $this->validate(\request(),[
          'name'=>"required",
          'email'=>"required|email",
          'password'=>"required|confirmed",

        ]);
        //Create and save user.


//        $user=User::create(\request(['name','email','password']));
        $user=User::create([
            'name'=>\request()->name,
            'email'=>\request()->email,
            'password' => bcrypt(\request()->password),
        ]);

        //Sign them in.

        $user=auth()->login($user);

        //Redirect the home page.
        return redirect('/');


    }
}
