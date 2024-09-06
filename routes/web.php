<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

use App\Models\Cake;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::view('/laravel', 'laravel-welcome');

Route::get('/', function () {
    return view('memories-cake', ['cakes' => Cake::limit(4)->get()]);
});



Route::get('register', [RegisteredUserController::class, 'create']);
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


Route::get('user', function () {
    return view('user.dashboard');
});

Route::get('user/cart', function () {
    return view('user.cart');
});

Route::get('user/order', function () {
    return view('user.order');
});


Route::get('cakes', function () {
    return view('cakes.index', ['cakes' => Cake::all()]);
});

Route::get('cakes/{id}', function ($id) {
    return view('cakes.show', ['cake' => Cake::find($id)]);
});

