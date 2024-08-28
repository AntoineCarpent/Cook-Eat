<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return 'Hello World';
});

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');



Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');  

});


