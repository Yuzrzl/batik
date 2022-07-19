<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('qwertyui'),
            'telp' => '085696753090',
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'yus',
            'email' => 'yus@gmail.com',
            'password' => bcrypt('qwertyui'),
            'telp' => '085696753090',
        ]);

        $user->assignRole('user');
    }
}
