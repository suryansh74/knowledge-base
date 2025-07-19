<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/permission', function () {
//     return auth()->user()->hasPermission('permission_create');
// });