<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About'], ['name' => 'Yanuar AlHisyami']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Kontak']);
});

Route::get('/sewa', function () {
    return view('sewa', ['title' => 'Sewa']);
});