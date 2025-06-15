<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 

        for ($i=1; $i <=10; $i++) { 
            $seller = new User;
            $seller->name = $faker->word();
            $seller->email = $faker->email();
            $seller->role = $faker->randomElement([1, 2]);
            $seller->password = Hash::make('admin');
            $seller->save();
        }
    }
}
 