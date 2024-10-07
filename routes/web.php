<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/portfolio-item1', function () {
    return view('sec');
});
