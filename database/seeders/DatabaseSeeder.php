<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Product;
use App\Models\Flash;
use App\Models\FlashSale;
use App\Models\Type;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

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
        Type::insert([
            'name' => 'Free Ongkir'
        ]);
        Type::insert([
            'name' => 'Potongan Harga (harga)'
        ]);
        Type::insert([
            'name' => 'Potongan Harga (persen)'
        ]);
        Voucher::insert([
            'types_id' => 1,
            'name' => 'FREEONGKIR'
        ]);
        Voucher::insert([
            'types_id' => 2,
            'name' => 'PTGHARGA',
            'discount' => 1000
        ]);
        Voucher::insert([
            'types_id' => 3,
            'name' => 'PTGPERSEN',
            'discount' => 10
        ]);
        // Category::insert([
        //     'name' => 'Semua',
        //     'image' => '/upload/category/semua.png'
        // ]);
        Category::insert([
            'name' => 'Buah',
            'image' => '/upload/category/buah.png'
        ]);
        Category::insert([
            'name' => 'Sayur',
            'image' => '/upload/category/sayur.png'
        ]);
        Category::insert([
            'name' => 'Daging dan Ikan',
            'image' => '/upload/category/daging.png'
        ]);
        Category::insert([
            'name' => 'Yoghurt',
            'image' => '/upload/category/yoghurt.png'
        ]);
        Category::insert([
            'name' => 'Ladanglima',
            'image' => '/upload/category/ladanglima.png'
        ]);
        Category::insert([
            'name' => 'Gula Merah',
            'image' => '/upload/category/gulamerah.png'
        ]);
        Category::insert([
            'name' => 'Bumbu Giling',
            'image' => '/upload/category/bumbugiling.png'
        ]);
        Category::insert([
            'name' => 'Olahan Kacang Kedelai',
            'image' => '/upload/category/olahankacangkedelai.png'
        ]);
        Flash::insert([
            'name' => '00:00 - 00:30',
            'start' => '00:00',
            'end' => '00:30'
        ]);
        Flash::insert([
            'name' => '08:00 - 08:30',
            'start' => '08:00',
            'end' => '08:30'
        ]);
        Flash::insert([
            'name' => '12:00 - 12:30',
            'start' => '12:00',
            'end' => '12:30'
        ]);
        Flash::insert([
            'name' => '15:00 - 15:30',
            'start' => '15:00',
            'end' => '15:30'
        ]);
        Flash::insert([
            'name' => '18:00 - 18:30',
            'start' => '18:00',
            'end' => '18:30'
        ]);
        Flash::insert([
            'name' => '20:00 - 20:30',
            'start' => '20:00',
            'end' => '20:30'
        ]);
        Flash::insert([
            'name' => '22:00 - 22:30',
            'start' => '22:00',
            'end' => '22:30'
        ]);
        $this->call(ProductSeeder1::class);
        // for($i = 1; $i <= 20; $i++){
        //     Product::insert([
        //         'name' => 'Sayur '.$i,
        //         'unit' => $i.' gram',
        //         'stock' => 10,
        //         'price' => '10000',
        //         'image' => '/upload/product/sayur.png',
        //         'categories_id' => 4
        //     ]);
        //     Product::insert([
        //         'name' => 'Daging '.$i,
        //         'unit' => $i.' kilo',
        //         'stock' => 10,
        //         'price' => '10000',
        //         'image' => '/upload/product/daging.png',
        //         'categories_id' => 3
        //     ]);
        //     Product::insert([
        //         'name' => 'Buah '.$i,
        //         'unit' => $i.' kilo',
        //         'stock' => 10,
        //         'price' => '10000',
        //         'image' => '/upload/product/buah.png',
        //         'categories_id' => 2
        //     ]);
        //     Product::insert([
        //         'name' => 'Bumbu '.$i,
        //         'unit' => $i.' gram',
        //         'stock' => 10,
        //         'price' => '10000',
        //         'image' => '/upload/product/bumbu.png',
        //         'categories_id' => 5
        //     ]);
    	// }
        // for($i = 1; $i <= 20; $i++){
        //     Product::insert([
        //         'name' => 'Sayur '.$i,
        //         'unit' => $i.' gram',
        //         'stock' => 10,
        //         'price' => '10000',
        //         'discount_price' => '8000',
        //         'image' => '/upload/product/sayur.png',
        //         'categories_id' => 4
        //     ]);
        //     Product::insert([
        //         'name' => 'Daging '.$i,
        //         'unit' => $i.' kilo',
        //         'stock' => 10,
        //         'price' => '10000',
        //         'discount_price' => '8000',
        //         'image' => '/upload/product/daging.png',
        //         'categories_id' => 3
        //     ]);
        //     Product::insert([
        //         'name' => 'Buah '.$i,
        //         'unit' => $i.' kilo',
        //         'stock' => 10,
        //         'price' => '10000',
        //         'discount_price' => '8000',
        //         'image' => '/upload/product/buah.png',
        //         'categories_id' => 2
        //     ]);
        //     Product::insert([
        //         'name' => 'Bumbu '.$i,
        //         'unit' => $i.' gram',
        //         'stock' => 10,
        //         'price' => '10000',
        //         'discount_price' => '8000',
        //         'image' => '/upload/product/bumbu.png',
        //         'categories_id' => 5
        //     ]);
        // }
        $k = 1;
        for($i = 1; $i <= 5; $i++){
            for($j = 1; $j <= 5; $j++){
                FlashSale::insert([
                    'flashes_id' => $i,
                    'products_id' => $k,
                    'new_price' => 5000
                ]);
                $k+=3;
            }
        }
    }
}
