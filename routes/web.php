<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cake;

Route::get('/laravel', function () {
    return view('laravel-welcome');
});

Route::get('/', function () {
    return view('memories-cake', ['cakes' => Cake::limit(4)->get()]);
});

Route::get('sign-in', function () {
    return view('sign-in');
});

Route::get('sign-up', function () {
    return view('sign-up');
});

Route::get('cakes', function () {


    return view('explore-cake', ['cakes' => Cake::all()]);
});
