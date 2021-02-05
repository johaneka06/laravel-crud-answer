<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/');
        } else {
            return redirect('/login')->withErrors("Username / password is not correct");
        }
    }

    public function register(Request $request)
    {
        $request = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:64',
            'name' => 'required'
        ]);
        
        $user = User::create([
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => bcrypt($request['password'])
        ]);

        $user = $user->fresh();

        Auth::attempt(["email" => $request['email'], "password" => $request['password']]);

        return redirect('/');
    }

    public function logout() 
    {
        Auth::logout();
        
        return redirect('/');
    }
}
