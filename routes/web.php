<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


// Automatically redirect to /home when accessing the root URL: http://127.0.0.1:8000
Route::get('/', function () {
    return redirect('home');
});

// or Manually add /home to http://127.0.0.1:8000 
Route::get('/home', [HomeController::class, 'index'])->name('home');
