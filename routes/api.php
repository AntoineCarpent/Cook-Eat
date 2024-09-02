<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');

// ---------------------------------------------------------------------------------------
Route::get('/recipes', [RecipeController::class, 'index']);

Route::get('/recipes/{id}', [RecipeController::class, 'show']); 
// ---------------------------------------------------------------------------------------

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/isadmin', [UserController::class, 'isAdmin'])->name('users.isadmin');

    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); 

    Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');

    
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    
    Route::delete('/favorites', [FavoriteController::class, 'destroy'])->name('favorites.destroy');



    Route::post('/recipes', [RecipeController::class, 'store']); 

    Route::put('/recipes/{id}', [RecipeController::class, 'update']); 

    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy']);


    Route::get('/ingredients', [IngredientController::class, 'index']); 

    Route::get('/ingredients/{id}', [IngredientController::class, 'show']); 

    Route::post('/ingredients', [IngredientController::class, 'store']); 

    Route::put('/ingredients/{id}', [IngredientController::class, 'update']);

    Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy']); 
});
