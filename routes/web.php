<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

use App\Models\Cake;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::view('/laravel', 'laravel-welcome');

Route::get('/', function () {
    return view('memories-cake', ['cakes' => Cake::limit(4)->get()]);
});

Route::view('/test', 'test');



Route::get('register', [RegisteredUserController::class, 'create']);
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


Route::get('user', function () {
    return view('user.dashboard');
});
Route::get('user/message', function () {
    return view('user.message');
});
Route::get('user/info', function () {
    return view('user.info');
});
Route::get('user/change-password', function () {
    return view('user.change-password');
});

Route::get('user/cart', function () {

    if (!Auth::check()) {
        return redirect('/login');
    }

    $cart = Auth::user()->carts()->where('status', '=', 'open')->with('cartItems.cake')->first();


    return view('user.cart', ['cart' => $cart]);
});

Route::get('user/order', function () {
    return view('user.order');
});







Route::post('user/cake/buy', function () {



    redirect('user/order');
});

Route::post('user/cake/cart', function () {

    if (!Auth::check()) {
        return redirect('/login');
    }

    request()->validate([
        'age' => ['required', 'integer', 'min:0', 'max:150'],
        'candle' => ['required'],
        'dedication' => ['required'],
        'quantity' => ['required', 'integer', 'min:1', "max:99"],
        'cake_id' => ['required'],
    ]);

    $cart = Cart::firstOrCreate(
        [
            'user_id' => Auth::user()->id,
            'status' => 'open'
        ]
    );

    $cart->cartItems()->create(
        [
            'cake_id' => request()->cake_id,
            'quantity' => request()->quantity,
            'age' => request()->age,
            'candle_type' => request()->candle,
            'dedication' => request()->dedication
        ]
    );

    $origin_url = 'cakes/' . request()['cake_id'];
    return redirect($origin_url)->with('showModal', true);
});






Route::get('cakes', function () {
    return view('cakes.index', ['cakes' => Cake::simplePaginate(21)]);
});

Route::get('cakes/{id}', function ($id) {



    return view('cakes.show', [
        'cake' => Cake::find($id),
        'show_modal' => session('showModal'),
    ]);
});










Route::get('sample', function() {

    $user = User::with('carts.cartItems.cake')->find(2);
    $items = [];
    $cakes = [];

    $u = User::find(2,['first_name', 'last_name']);

    foreach ($user->carts as $carts) {
        foreach($carts->cartItems as $item) {
            $items[] = $item;
            $cakes[] = $item->cake;
        }
    }

    $us = User::select(['first_name', 'last_name'])->get();



    dd($items, $us);
});


