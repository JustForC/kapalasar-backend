<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        Role::insert([
            'name' => "Super Admin"
        ]);
        Role::insert([
            'name' => "Admin"
        ]);
        Role::insert([
            'name' => "Merchant"
        ]);
        Role::insert([
            'name' => "User"
        ]);
        User::insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@kapalasar.id',
            'password' => bcrypt('superadmin'),
            'roles_id' => 1
        ]);
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@kapalasar.id',
            'password' => bcrypt('superadmin'),
            'roles_id' => 2
        ]);
        User::insert([
            'name' => 'Merchant',
            'email' => 'merchant@kapalasar.id',
            'password' => bcrypt('superadmin'),
            'roles_id' => 3,
            'referral_code' => 'assany'
        ]);
        Category::insert([
            'name' => 'Semua',
            'image' => '/upload/category/semua.png'
        ]);
        Category::insert([
            'name' => 'Promo',
            'image' => '/upload/category/promo.png'
        ]);
        Category::insert([
            'name' => 'Buah',
            'image' => '/upload/category/buah.png'
        ]);
        Category::insert([
            'name' => 'Daging',
            'image' => '/upload/category/daging.png'
        ]);
        Category::insert([
            'name' => 'Sayur',
            'image' => '/upload/category/sayur.png'
        ]);
        Category::insert([
            'name' => 'Bumbu',
            'image' => '/upload/category/bumbu.png'
        ]);
        for($i = 1; $i <= 40; $i++){
            Product::insert([
                'name' => 'Sayur '.$i,
                'unit' => $i,
                'stock' => 100,
                'price' => '10000',
                'image' => '/upload/product/sayur.png',
                'categories_id' => 5
            ]);
            Product::insert([
                'name' => 'Daging '.$i,
                'unit' => $i,
                'stock' => 100,
                'price' => '10000',
                'image' => '/upload/product/daging.png',
                'categories_id' => 4
            ]);
            Product::insert([
                'name' => 'Buah '.$i,
                'unit' => $i,
                'stock' => 100,
                'price' => '10000',
                'image' => '/upload/product/buah.png',
                'categories_id' => 3
            ]);
            Product::insert([
                'name' => 'Bumbu '.$i,
                'unit' => $i,
                'stock' => 100,
                'price' => '10000',
                'image' => '/upload/product/bumbu.png',
                'categories_id' => 6
            ]);
    	}
        User::insert([
            'name' => 'Ghema Allan',
            'email' => 'ghemaallan@gmail.com',
            'password' => bcrypt('superadmin'),
            'roles_id' => 4,
        ]);
    }
}
