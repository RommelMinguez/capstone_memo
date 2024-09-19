<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

use App\Models\Cake;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\CartController;

Route::view('/laravel', 'laravel-welcome');

Route::get('/', function () {
    return view('memories-cake', ['cakes' => Cake::limit(4)->get()]);
});





Route::get('register', [RegisteredUserController::class, 'create']);
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('user/cart', [CartController::class, 'index']);
Route::post('user/cart', [CartController::class, 'store']);
Route::patch('user/cart', [CartController::class, 'remove']);
Route::put('user/cart', [CartController::class, 'update']);





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



Route::get('user/order', function () {
    $items = CartItem::whereIn('id', request()->order)->with('cake')->get();

    return view('user.order', [
        'items' => $items,
    ]);
});

Route::post('user/cake/buy', function () {
    redirect('user/order');
});







Route::get('cakes', function () {
    return view('cakes.index', ['cakes' => Cake::simplePaginate(21)]);
});

Route::get('cakes/{cake}', function (Cake $cake) {
    return view('cakes.show', [
        'cake' => $cake,
        'show_modal' => session('showModal'),
    ]);
});








Route::view('/test', 'test');

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


