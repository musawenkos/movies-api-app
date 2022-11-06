<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register/Create Form
    public function create(){
        return view('users.register');
    }

    //Create New User
    public function store(Request $request){
        $formField = $request->validate([
            'name' => ['required'],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required | confirmed | min:6',
        ]);

        //Hash Password
        $formField['password'] = bcrypt($formField['password']);

        //Create User
        $user = User::create($formField);

        //Login
        auth()->login($user);

        return redirect('/');

    }

    //Logout User
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    //Show Login Form
    public function login(){
        return view('users.login');
    }

    //Authenticate User
    public function authenticate(Request $request){
        $formField = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        if(auth()->attempt($formField)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You are now logged in');
        }

        return back()->withError(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

}
