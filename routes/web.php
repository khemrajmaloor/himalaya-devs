<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/portfolio-item1', function () {
    return view('book');
});
