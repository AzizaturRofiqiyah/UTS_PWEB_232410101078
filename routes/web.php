<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login', [PageController::class, 'loginPage'])->name('login');

Route::post('/login', [PageController::class, 'loginProcess']);

Route::get('/dashboard', [PageController::class, 'dashboard']);

Route::get('/profile', [PageController::class, 'profile']);

Route::get('/pengelolaan', [PageController::class, 'pengelolaan']);
Route::patch('/pengelolaan/update/{index}', [PageController::class, 'updateStok']);
