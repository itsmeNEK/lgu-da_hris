<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $this->call([
        //     referenceSeeder::class,
        //     UserSeeder::class
        // ]);

        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
    	foreach (range(1,200) as $index) {
            DB::table('users')->insert([
                'first_name' => $faker->firstName($gender),
                'last_name' => $faker->lastName($gender),
                'email' => $faker->email,
                'password' => Hash::make("kenken12345"),
                'role' => rand(1,5),
                'avatar' => "avatar.png",
            ]);
        }
    }
}
