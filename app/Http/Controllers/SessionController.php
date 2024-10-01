<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;


class SessionController extends Controller
{
    public function create() {
        if(Auth::check()) {
            if(Auth::user()->is_admin) {
                return redirect('/admin');
            }
            return redirect('/user');
        }

        return view('auth.login');
    }

    public function store() {

        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($attributes, request()->has('remember_me'))) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email'); // Keep the email input
        };

        request()->session()->regenerate();

        if (Auth::user()->is_admin) {
            return redirect('/admin');
        }

        if(Session::has('url.intended')) {
            $path = Session::get('url.intended');
            Session::forget('url.intended');
            return redirect($path);
        }

        return redirect('/user');
    }

    public function destroy() {
        Auth::logout();

        return redirect('/');
    }
}
