<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function register(mixed $type)
    {
        return view('auth.register')->with('type', $type);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect('register/sign-up')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
        }
        return redirect('/');
    }
    public function login()
    {
        validator(request()->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ])->validate();
        if (auth()->attempt(request()->only('email', 'password'))) {
            return redirect('/');
        } else {
            return redirect('register/login')->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
}
