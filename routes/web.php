<?php

use Illuminate\Support\Facades\Route;

/**
 * Web route URL 
 * 
 */
Route::get('/', function () {
    return view('index');
});

// Book site page route
Route::get('/portfolio-item1', function () {
    return view('book');
});
