<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();


});



    Route::get('/recipes', [RecipeController::class, 'index']); 
    Route::get('/recipes/{id}', [RecipeController::class, 'show']); 
    Route::post('/recipes', [RecipeController::class, 'store']); 
    Route::put('/recipes/{id}', [RecipeController::class, 'update']); 
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy']);
    Route::get('/ingredients', [IngredientController::class, 'index']); 
    Route::get('/ingredients/{id}', [IngredientController::class, 'show']); 
    Route::post('/ingredients', [IngredientController::class, 'store']); 
    Route::put('/ingredients/{id}', [IngredientController::class, 'update']);
    Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy']); 

