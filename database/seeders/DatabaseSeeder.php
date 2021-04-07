<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;
use App\Models\Role;

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
        Role::create([
            'name' => "Super Admin"
        ]);
        Role::create([
            'name' => "Admin"
        ]);
        Role::create([
            'name' => "Merchant"
        ]);
        Role::create([
            'name' => "User"
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@kapalasar.id',
            'password' => Hash::make('superadmin'),
            'roles_id' => 1
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@kapalasar.id',
            'password' => Hash::make('superadmin'),
            'roles_id' => 2
        ]);
        User::create([
            'name' => 'Merchant',
            'email' => 'merchant@kapalasar.id',
            'password' => Hash::make('superadmin'),
            'roles_id' => 3,
            'referral_code' => 'assany'
        ]);
    }
}
