<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class RegisteredUserController extends Controller
{
    public function create() {
        if(Auth::check()) {
            if(Auth::user()->is_admin) {
                return redirect('/admin');
            }
            return redirect('/user');
        }

        return view('auth.register');
    }

    public function store() {
        request()->validate([
            'first_name' => ['required', ],
            'last_name' => ['required', ],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone_number' => ['required', 'digits:11'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        $user = User::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'email' => request()->email,
            'phone_number' => request()->phone_number,
            'password' => bcrypt(request()->password),
            'image_src' => 'public/images/default/default-profile.jpg'
        ]);

        Auth::login($user);

        if(Session::has('url.intended')) {
            return redirect(Session::get('url.intended'));
        }

        return redirect('user');
    }
}
