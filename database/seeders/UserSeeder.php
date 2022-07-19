<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('qwertyui')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'yus',
            'email' => 'yus@gmail.com',
            'password' => bcrypt('qwertyui')
        ]);

        $user->assignRole('user');
    }
}
