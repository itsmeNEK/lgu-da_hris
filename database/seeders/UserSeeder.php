<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin.admin@admin.admin',
                'email_verified_at' => now(),
                'password' => Hash::make('delfinalbanohris'),
                'role' => '0',
                'avatar' => 'avatar.png',
            ],
            [
                'first_name' => 'BILL ZHEDRICK',
                'last_name' => 'GASPAR',
                'email' => 'gasparkenken55@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('kenken12345'),
                'role' => '0',
                'avatar' => 'avatar.png',
            ]
            ];
            $this->user->insert($user);
    }
}
