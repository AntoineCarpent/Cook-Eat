<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;

use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::with('ingredients')->get(); 
        return response()->json($recipes); 
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $ingredient = Ingredient::create($request->all());
        return response()->json([
            'ingredients' => $ingredient
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);
    
        $ingredient = Ingredient::find($id);        
        $ingredient->update($request->all());
    
        return response()->json([
            'ingredients' => $ingredient
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        return response()->json([
            'ingredients' => $ingredient
        ]);
    }
}

