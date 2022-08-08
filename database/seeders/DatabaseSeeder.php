<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create('lt_LT');

         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password'=> Hash::make('123')
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@example.com',
             'password'=> Hash::make('123'),
             'role'=> 10
         ]);

        foreach (range(1, 15) as $_) {
            DB::table('hotels')->insert([
                'name' => $faker->company(),
                'price' => rand(9999, 999999) / 100

            ]);
        }
        foreach (range(1, 15) as $_) {
            DB::table('countries')->insert([
                'name' => $faker->country(),
                'timezone' => $faker->timezone()
            ]);
        }
    }
}
