<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'time',
        'serving',
        'ustensils',
        'appliance'
    ];

    public function ingredient(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients')->withPivot('quantity', 'unit');
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

}
