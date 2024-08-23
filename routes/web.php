<?php

use Illuminate\Support\Facades\Route;

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('memories-cake');
});

Route::get('sign-in', function () {
    return view('sign-in');
});

Route::get('sign-up', function () {
    return view('sign-up');
});

Route::get('cakes', function () {
    return view('explore-cake');
});
