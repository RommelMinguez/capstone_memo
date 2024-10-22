<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Hash;
use Illuminate\Database\Eloquent\Collection;
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

        $allItems = OrderItem::whereIn('order_id', $orders)->with('cake', 'order.address', 'order.user', 'order.orderItems.cake')->latest()->get()->groupBy('status');
        $allItems->put('review', collect());
        if ($allItems->has('completed')) {
            $allItems->get('completed')->each(function ($item, $key) use ($allItems) {
                $hasReview = Auth::user()->reviews()->where('cake_id', $item->cake->id)->exists();
                if (!$hasReview) {
                    $allItems->get('review')->push($item);
                    $allItems->get('completed')->forget($key);
                }
            });
        }

        //dd($allItems->toArray());

        return view('user.track-order', compact('allItems'));
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
        request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone_number' => ['required', 'numeric'],
            'imageInput' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
            'gender' => 'string',
            'birthday' => 'date'
        ]);

        if(request()->imageInput == '') {
            Auth::user()->update([
                'first_name' => request()->first_name,
                'last_name' => request()->last_name,
                'email' => request()->email,
                'phone_number' => request()->phone_number,
                'gender' => request()->gender,
                'birthday' => request()->birthday,
            ]);
        } else {

            $path = request()->file('imageInput')->store('public/images/profile');

            Auth::user()->update([
                'first_name' => request()->first_name,
                'last_name' => request()->last_name,
                'email' => request()->email,
                'phone_number' => request()->phone_number,
                'gender' => request()->gender,
                'birthday' => request()->birthday,
                'image_src' => $path
            ]);
        }


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
