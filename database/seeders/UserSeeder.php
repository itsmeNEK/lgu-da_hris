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
                'password' => Hash::make('admin'),
                'role' => '0',
                'avatar' => 'avatar.png',
            ],
            [
                'first_name' => 'BILL ZHEDRICK',
                'last_name' => 'GASPAR',
                'email' => 'gasparkenken55@gmail.com',
                'password' => Hash::make('kenken12345'),
                'email_verified_at' => null,
                'role' => '0',
                'avatar' => 'avatar.png',
            ]
            ];
            $this->user->insert($user);
    }
}
