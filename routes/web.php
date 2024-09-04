<?php

use Illuminate\Support\Arr;
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
    return view('cakes.index', ['cakes' => Cake::all()]);
});

Route::get('cakes/{id}', function ($id) {
    return view('cakes.show', ['cake' => Cake::find($id)]);
});
