<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = [
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'test@test.ru',
            'password' => Hash::make('123321123'),
        ];
        User::create($user);
        // \App\Models\User::factory(10)->create();
    }
}
