<?php

namespace Database\Seeders;

use App\Models\hr\Publication;
use App\Models\User;
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

        $this->call([
            referenceSeeder::class,
            UserSeeder::class,
            SampleSeeder::class,
        ]);
    }
}
