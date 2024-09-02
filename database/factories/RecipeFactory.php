<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


        public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'time' => $this->faker->word,
            'serving' => $this->faker->numberBetween(1, 10),
            'ustensils' => $this->faker->sentence,
            'appliance' => $this->faker->word,
        ];
    }

    public function withSpecificData($data)
    {
        return $this->state($data);
    }
    
}
