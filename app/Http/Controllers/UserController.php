<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function showTrackOrder()
    {
        $orders = Auth::user()->orders()->pluck('id');

        $items = OrderItem::whereIn('order_id', $orders)->with('cake')->get();

        return view('user.track-order', [
            'items' => $items
        ]);
    }

    public function showMessage()
    {
        return view('user.message');
    }

    public function showInfo()
    {
        return view('user.info');
    }

    public function updateInfo()
    {
        $validatedData = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone_number' => ['required', 'numeric'],
            // 'address' => ['required']
        ]);

        Auth::user()->update($validatedData);

        return redirect()->back()->with('success', 'Account Information Updated Successfully!');
    }

    public function showChangePassword() {
        return view('user.change-password');
    }

    public function updatePassword() {
        request()->validate([
            'old_password' => ['required', Password::min(6)],
            'new_password' => ['required', Password::min(6), 'confirmed'],
        ]);

        if (!Hash::check(request()->old_password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'old_password' => 'Your old password does not match our records.'
            ]);
        }

        Auth::user()->update([
            'password' => Hash::make(request()->new_password)
        ]);

        return redirect('/user/change-password')->with('success', 'Password Changed Successfully!');
    }
}
