<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryId = Category::pluck('id')->toArray();
        // dd($categoryId);
        $faker = Faker::create(); 

        for ($i=1; $i <=10; $i++) { 
            $subCategory = new Product();
            $subCategory->category_id = $faker->randomElement($categoryId);
            $subCategory->name = $faker->word();
            $subCategory->slug = $faker->word(3);
            $subCategory->status = $faker->randomElement([0, 1]);
            $subCategory->save();
        }
    }
}
