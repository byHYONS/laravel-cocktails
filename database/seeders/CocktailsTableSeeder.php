<?php

namespace Database\Seeders;

use App\Models\Cocktail;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CocktailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 50; $i++) {
            $cocktail = new Cocktail();

            $cocktail->img = 'https://www.cucchiaio.it/content/cucchiaio/it/ricette/2019/06/negroni/_jcr_content/header-par/image-single.img.jpg/1560847989682.jpg';
            $cocktail->name = $faker->firstName();
            $cocktail->description = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et architecto consequatur cum aliquam, ipsam accusantium.';
            $cocktail->method = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et architecto consequatur cum aliquam, ipsam accusantium.';
            $cocktail->ingredients = 'Campari, Vermouth, Ghiaccio, Gin, Arance';
            $cocktail->price = $faker->randomNumber(2, true);

            $cocktail->save();
        }
    }
}
