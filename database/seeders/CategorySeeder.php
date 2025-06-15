<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 

        for ($i=1; $i <=10; $i++) { 
            $category = new Category();
            $category->name = $faker->word();
            $category->slug = $faker->word(3);
            $category->image = null;
            $category->status = $faker->randomElement([0, 1]);
            $category->save();
        }
    }
}
