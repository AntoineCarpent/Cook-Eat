<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        $user = auth()->user();
        $recipe = Recipe::find($request->recipe_id);

        if ($user->favorites()->where('recipe_id', $recipe->id)->exists()) {
            return response()->json(['message' => 'Recipe is already in your favorites'], 409);
        }

        $user->favorites()->attach($recipe);

        return response()->json(['message' => 'Recipe added to favorites'], 201);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        $user = auth()->user();
        $recipe = Recipe::find($request->recipe_id);

        if (!$user->favorites()->where('recipe_id', $recipe->id)->exists()) {
            return response()->json(['message' => 'Recipe is not in your favorites'], 404);
        }

        $user->favorites()->detach($recipe);

        return response()->json(['message' => 'Recipe removed from favorites'], 200);
    }
}
