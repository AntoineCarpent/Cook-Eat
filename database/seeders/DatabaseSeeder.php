<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Ingredient;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User Admin',
        //     'email' => 'test@example.com',
        //     'role' => 'administrator',
        //     'password' => 'password',
        // ]);

        $recipe = Recipe::create([
            'title' => "Limonade de Coco",
            'description' => "Mettre les glaçons à votre goût dans le blender, ajouter le lait, la crème de coco, le jus de 2 citrons et le sucre. Mixer jusqu'à avoir la consistence désirée",
            'image' => 'images/Limonade de Coco.jpg',
            'time' => '10 minutes',
            'serving' => '1',
            'ustensils' => "Cuillère à soupe, verres, presse-citron",
            'appliance' => "Blender"
        ]);

        $ingredients = [
            [
                'title' => 'Lait de coco',
                'quantity' => 400,
                'unit' => 'ml'
            ],
            [
                'title' => 'Jus de citron',
                'quantity' => 2,
                'unit' => null
            ],
            [
                'title' => 'Crème de coco',
                'quantity' => 2,
                'unit' => 'cuillères à soupe'
            ],
            [
                'title' => 'Sucre',
                'quantity' => 30,
                'unit' => 'grammes'
            ],
            [
                'title' => 'Glaçons',
                'quantity' => null,
                'unit' => null
            ]
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['title' => $ingredientData['title']]);

            $recipe->ingredient()->attach($ingredient->id, [
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit']
            ]);
        }


        $recipe = Recipe::create([
            'title' => "Poisson Cru à la tahitienne",
            'description' => "Découper le thon en dés, mettre dans un plat et recouvrir de jus de citron vert (mieux vaut prendre un plat large et peu profond). Laisser reposer au réfrigérateur au moins 2 heures. (Si possible faites-le le soir pour le lendemain. Après avoir laissé mariner le poisson, coupez le concombre en fines rondelles sans la peau et les tomates en prenant soin de retirer les pépins. Rayer la carotte. Ajouter les légumes au poissons avec le citron cette fois ci dans un Saladier. Ajouter le lait de coco. Pour ajouter un peu plus de saveur vous pouvez ajouter 1 à 2 cuillères à soupe de Crème de coco",
            'image' => 'images/Poisson Cru à la tahitienne.jpg',
            'time' => '60 minutes',
            'serving' => '2',
            'ustensils' => "Presse-citron",
            'appliance' => "Saladier"
        ]);

        $ingredients = [
            [
                'title' => 'Thon Rouge (ou blanc)',
                'quantity' => 200,
                'unit' => 'grammes'
            ],
            [
                'title' => 'Concombre',
                'quantity' => 1,
                'unit' => null
            ],
            [
                'title' => 'Tomate',
                'quantity' => 2,
                'unit' => null
            ],
            [
                'title' => 'Carotte',
                'quantity' => 1,
                'unit' => null
            ],
            [
                'title' => 'Citron Vert',
                'quantity' => 5,
                'unit' => null
            ],
            [
                'title' => 'Lait de Coco',
                'quantity' => 100,
                'unit' => 'ml'
            ]
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['title' => $ingredientData['title']]);

            $recipe->ingredient()->attach($ingredient->id, [
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit']
            ]);
        }

        $recipe = Recipe::create([
            'title' => "Poulet coco réunionnais",
            'description' => "Découper le poulet en morceaux, les faire dorer dans une cocotte avec de l'huile d'olive. Salez et poivrez. Une fois doré, laisser cuire en ajoutant de l'eau. Au bout de 30 minutes, ajouter le coulis de tomate, le lait de coco ainsi que le poivron et l'oignon découpés en morceaux. Laisser cuisiner 30 minutes de plus. Servir avec du riz",
            'image' => 'images/Poulet coco réunionnais.jpg',
            'time' => '80 minutes',
            'serving' => '4',
            'ustensils' => "Couteau",
            'appliance' => "Cocotte"
        ]);

        $ingredients = [
            [
                'title' => 'Poulet',
                'quantity' => 1,
                'unit' => null // Peut être laissé null si aucune unité n'est fournie
            ],
            [
                'title' => 'Lait de coco',
                'quantity' => 400,
                'unit' => 'ml'
            ],
            [
                'title' => 'Coulis de tomate',
                'quantity' => 25,
                'unit' => 'cl'
            ],
            [
                'title' => 'Oignon',
                'quantity' => 1,
                'unit' => null
            ],
            [
                'title' => 'Poivron rouge',
                'quantity' => 1,
                'unit' => null
            ],
            [
                'title' => 'Huile d\'olive',
                'quantity' => 1,
                'unit' => 'cuillères à soupe'
            ]
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['title' => $ingredientData['title']]);

            $recipe->ingredient()->attach($ingredient->id, [
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit']
            ]);
        }

    }
}

