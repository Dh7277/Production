<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 

        for ($i=1; $i <=10; $i++) { 
            $brands = new Brand();
            $brands->name = $faker->word();
            $brands->slug = $faker->word(3);
            $brands->status = $faker->randomElement([0, 1]);
            $brands->save();
        }
    }
}
