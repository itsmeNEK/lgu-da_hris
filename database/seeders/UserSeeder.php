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
                'password' => Hash::make('admin'),
                'role' => '0',
                'avatar' => 'avatar.png',
            ]
            ];
            $this->user->insert($user);
    }
}
