<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        auth()->login($user);


        Mail::to($user)->send(new Welcome($user));
        //Redirect the home page.
        return redirect('/');


    }
}
