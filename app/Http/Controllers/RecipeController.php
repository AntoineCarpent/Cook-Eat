<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipe = Recipe::all();
            return response()->json([
                'recipes' => $recipe
            ]);
        }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'time' => 'nullable|string',
            'serving' => 'nullable|string',
            'ustensils' => 'nullable|string',
            'appliance' => 'nullable|string',
            'ingredients' => 'array'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $path;
        }
    
        $recipe = Recipe::create($validatedData);
        $recipe->ingredient()->attach($request->input('ingredients'));
    
        return response()->json([
            'recipe' => $recipe
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        $recipe = Recipe::find($id);
        return response()->json([
            'recipes' => $recipe,
            ]);
        }
    

    /**
     * Update the specified resource in storage.
     */
 /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image',
        'time' => 'nullable|string',
        'serving' => 'nullable|string',
        'ustensils' => 'nullable|string',
        'appliance' => 'nullable|string',
        'ingredients' => 'array'
    ]);

    $recipe = Recipe::find($id);        
    $recipe->update($request->all());

    return response()->json([
        'recipe' => $recipe
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return response()->json([
            'recipes' => $recipe
        ]);
    }
}

