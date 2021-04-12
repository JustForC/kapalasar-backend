<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FlashSale;

class ProductSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::insert([
        //     'name' => 'Sayuran',
        //     'image' => '/upload/category/sayuran.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Buah',
        //     'image' => '/upload/category/buah.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Buah Premium',
        //     'image' => '/upload/category/buah-premium.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Bumbu',
        //     'image' => '/upload/category/bumbu.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Bumbu Giling',
        //     'image' => '/upload/category/bumbu-giling.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Olahan Kedelai',
        //     'image' => '/upload/category/olahan-kedelai.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Daging dan Ikan',
        //     'image' => '/upload/category/daging-ikan.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Seafood',
        //     'image' => '/upload/category/seafood.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Olahan Ikan',
        //     'image' => '/upload/category/olahan-ikan.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Kapalasar Organik X Ladang Lima',
        //     'image' => '/upload/category/kapalasar-organik-ladang-lima.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Frozen Food',
        //     'image' => '/upload/category/frozen-food.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Paket Siap Masak',
        //     'image' => '/upload/category/siap-masak.jpeg'
        // ]);
        // Category::insert([
        //     'name' => 'Paket Siap Makan',
        //     'image' => '/upload/category/siap-makan.jpeg'
        // ]);


        $i = 1;
        DB::table('products')->insert([
            'uniq'=>$i,
                'name'=>'Apel Fuji',
                'price'=>'38000',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/apel-fuji.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Apel Washington',
                'price'=>'44200',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/apel-washington.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Apel Malang',
                'price'=>'26700',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/apels.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bengkuang',
                'price'=>'12300',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/bengkuang.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Jambu Kristal',
                'price'=>'23600',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/jambu-kristal.jpg',
                'categories_id'=>3,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Jeruk Peras',
                'price'=>'18000',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/jeruk-dua.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Jeruk Medang Brastagi',
                'price'=>'18000',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/jeruk.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Manggis',
                'price'=>'19200',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/manggu.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Melon (2-2.5kg)',
                'price'=>'38000',
                'unit' => '/pc',
            'stock' => 10,
                'image'=>'/upload/product/buah/melon.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Nanas Bogor',
                'price'=>'13000',
                'unit' => '/pc',
            'stock' => 10,
                'image'=>'/upload/product/buah/nanas.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Pisang Tanduk',
                'price'=>'15500',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/pisang-tanduk.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Salak Podoh Besar',
                'price'=>'18000',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/buah/salak.jpg',
                'categories_id'=>2,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bawang Bombay',
                'price'=>'10500',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/bawang-bombay.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bawang Daun',
                'price'=>'8000',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/bawang-daun.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bawang Merah Sumenep',
                'price'=>'16700',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/bawang-merah-sumenep.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Brokoli',
                'price'=>'12700',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/brokoli.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cabe Gendot',
                'price'=>'6000',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/cabe-gendot.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cabe Hijau Besar',
                'price'=>'6400',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/cabe-hijau-besar.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cabe Hijau Keriting',
                'price'=>'8600',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/cabe-keriting-hijau.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cabe Merah Keriting',
                'price'=>'10100',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/cabe-keriting-merah.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cabe Merah Tanjung',
                'price'=>'11500',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/cabe-merah-besar.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cabe Rawit Merah',
                'price'=>'18000',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/cabe-rawit-merah.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cabe Rawit Hijau',
                'price'=>'9200',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/cabe-rawit.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Daun Jeruk',
                'price'=>'6700',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/daun-jeruk.jpg',
                'categories_id'=>4,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Jagung Manis Kupas',
                'price'=>'17700',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/sayur/jagung-manis.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Jamur Kuping',
                'price'=>'7700',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/jamur-kuping.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Jeruk Purut',
                'price'=>'17700',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/jeruk-purut.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Kale',
                'price'=>'11700',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/kale.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Kentang',
                'price'=>'11500',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/kentang.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Kiciwis',
                'price'=>'8000',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/kiciwis.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Kol Ungu',
                'price'=>'46500',
                'unit' => '/Kg',
            'stock' => 10,
                'image'=>'/upload/product/sayur/kol-ungu.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Kucai',
                'price'=>'11700',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/kucai.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Lengkuas',
                'price'=>'7700',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/lengkuas.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Leunca',
                'price'=>'7700',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/leunca.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Pakcoy',
                'price'=>'13000',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/pakcoy.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Paprika Hijau',
                'price'=>'12100',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/paprika-hijau.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Paprika Kuning',
                'price'=>'13600',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/paprika-kuning.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Paprika Merah',
                'price'=>'12100',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/paprika-merah.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Pare Hijau',
                'price'=>'15200',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/pare.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Sawi Hijau',
                'price'=>'13000',
                'unit' => '/Ikat',
            'stock' => 10,
                'image'=>'/upload/product/sayur/sawi-hijau.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Sawi Putih',
                'price'=>'19200',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/sawi-putih.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Terong Lalap Hijau',
                'price'=>'7700',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/terong-hijau-lalap.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Terong Ungu',
                'price'=>'10200',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/terong-ungu-besar.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tauge',
                'price'=>'7700',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/toge.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tomat Ceri',
                'price'=>'9000',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/tomat-ceri.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Wortel',
                'price'=>'9000',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/wortel.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Zuchini',
                'price'=>'12100',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/sayur/zuchini.jpg',
                'categories_id'=>1,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ayam Pejantan',
                'price'=>'47700',
                'unit' => '/Ekor',
            'stock' => 10,
                'image'=>'/upload/product/daging/ayam-pejantan.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ayam Potong Campur',
                'price'=>'27700',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/ayam-potong.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Babat Sapi',
                'price'=>'16500',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/babat.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cumi-Cumi Besar',
            'price'=>'51500',
            'unit' => '/500gr',
        'stock' => 10,
            'image'=>'/upload/product/daging/cumi-dua.jpg',
            'categories_id'=>8,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cumi Sotong',
                'price'=>'31500',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/cumi-satu.jpg',
                'categories_id'=>8,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Cumi-Cumi Kecil',
                'price'=>'35200',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/cumi-tiga.jpg',
                'categories_id'=>8,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Gurame',
                'price'=>'24000',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/gurame.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Hati Sapi',
                'price'=>'25800',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/hati-sapi.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Iga Sapi (Dengan Tulang)',
                'price'=>'60200',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/iga-empat.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Iga Sapi (Tanpa Tulang)',
                'price'=>'79000',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/iga.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Mas',
                'price'=>'19600',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/ikan-mas.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Kakap Merah',
                'price'=>'25800',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/kakap-merah.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Kembung Biasa',
                'price'=>'25800',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/kembung.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Kembung Banjar',
                'price'=>'27700',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/kembung.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Lele Besar',
                'price'=>'19000',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/lele.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Lele Kecil',
                'price'=>'19600',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/lele.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Nila Merah',
                'price'=>'21500',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/nila-merah.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Nila',
                'price'=>'19600',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/nila.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Asin Peda Merah',
                'price'=>'22700',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/peda-merah.jpg',
                'categories_id'=>9,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Pindang Tongkol',
                'price'=>'19000',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/pindang-tongkol.jpg',
                'categories_id'=>9,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Sarden',
                'price'=>'22700',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/sarden.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Teri Medan Putih',
                'price'=>'52700',
                'unit' => '/250gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/teri-putih-medan.jpg',
                'categories_id'=>9,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Tongkol',
                'price'=>'21500',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/tongkol.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Ikan Tuna (Sliced)',
                'price'=>'39600',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/tuna-sliced.jpg',
                'categories_id'=>7,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Udang Peci Besar',
                'price'=>'63300',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/udang.jpg',
                'categories_id'=>8,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Udang Peci Sedang',
                'price'=>'50200',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/udang.jpg',
                'categories_id'=>8,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Udang Peci Kecil',
                'price'=>'47700',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/daging/udang.jpg',
                'categories_id'=>8,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Blackmond',
                'price'=>'38000',
                'unit' => '/180gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/blackmond.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Blackthins',
                'price'=>'34200',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/blackthins.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Mie Basil n Garlic (/2-3org)',
                'price'=>'26700',
                'unit' => '/150gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/mie-basil-besar.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Mie Basil n Garlic (/1org)',
                'price'=>'14200',
                'unit' => '/76gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/mie-basil.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Mie Beet (/1org)',
                'price'=>'14200',
                'unit' => '/76gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/mie-bit.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Mie Kale (/1org)',
                'price'=>'14200',
                'unit' => '/76gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/mie-kale-leave-kecil.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Mie Kale (/1org)',
                'price'=>'14200',
                'unit' => '/76gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/mie-kale-leave-kecil.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Mie Tomat (/2-3org)',
                'price'=>'26700',
                'unit' => '/150gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/mie-tomat-besar.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Mie Kale (/2-3org)',
                'price'=>'26700',
                'unit' => '/150gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/mie-kale-leaves.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Mie Bayam Merah',
                'price'=>'26700',
                'unit' => '/150gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/mie-red-spinach.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Mie Tomat (/1org)',
                'price'=>'14200',
                'unit' => '76gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/mie-tomat-kecil.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Pasta Bolognese',
                'price'=>'36900',
                'unit' => '/155gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/pasta-bolognese.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Pasta Fusili',
                'price'=>'24200',
                'unit' => '/100gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/pasta-fucini.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Pasta Mac n Cheese',
                'price'=>'34200',
                'unit' => '/155gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/pasta-macncheese.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tepung Bumbu',
                'price'=>'19700',
                'unit' => '/150gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/tepung-bumbu-serbaguna.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tepung Casava',
                'price'=>'17700',
                'unit' => '/500gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/tepung-mocaf.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Pancake Mix',
                'price'=>'23700',
                'unit' => '/220gr',
            'stock' => 10,
                'image'=>'/upload/product/ladanglima/tepung-pancake.jpg',
                'categories_id'=>10,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bumbu Jahe Basah',
                'price'=>'7000',
                'unit' => '/Pack',
            'stock' => 10,
                'image'=>'/upload/product/bumbugiling/jahe.jpg',
                'categories_id'=>5,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bumbu BW Merah Basah',
                'price'=>'7000',
                'unit' => '/Pack',
            'stock' => 10,
                'image'=>'/upload/product/bumbugiling/bawang-merah.jpg',
                'categories_id'=>5,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bumbu BW Putih Basah',
                'price'=>'7000',
                'unit' => '/Pack',
            'stock' => 10,
                'image'=>'/upload/product/bumbugiling/bawang-putih.jpg',
                'categories_id'=>5,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bumbu Cabe Merah Basah',
                'price'=>'7000',
                'unit' => '/Pack',
            'stock' => 10,
                'image'=>'/upload/product/bumbugiling/cabe-merah.jpg',
                'categories_id'=>5,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bumbu Kemiri Basah',
                'price'=>'7000',
                'unit' => '/Pack',
            'stock' => 10,
                'image'=>'/upload/product/bumbugiling/kemiri-basah.jpg',
                'categories_id'=>5,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bumbu Kemiri Kering',
                'price'=>'7000',
                'unit' => '/Pack',
            'stock' => 10,
                'image'=>'/upload/product/bumbugiling/kemiri-kering.jpg',
                'categories_id'=>5,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bumbu Kunyit Basah',
                'price'=>'7000',
                'unit' => '/Pack',
            'stock' => 10,
                'image'=>'/upload/product/bumbugiling/kunyit.jpg',
                'categories_id'=>5,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Bumbu Laos Basah',
                'price'=>'7000',
                'unit' => '/Pack',
            'stock' => 10,
                'image'=>'/upload/product/bumbugiling/laos.jpg',
                'categories_id'=>5,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Oncom Super',
                'price'=>'11100',
                'unit' => '/pc',
            'stock' => 10,
                'image'=>'/upload/product/olahankacangkedelai/oncom.jpg',
                'categories_id'=>6,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Oncom Biasa',
                'price'=>'6100',
                'unit' => '/pc',
            'stock' => 10,
                'image'=>'/upload/product/olahankacangkedelai/oncom.jpg',
                'categories_id'=>6,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tahu Kuning Besar',
                'price'=>'12300',
                'unit' => '/10pcs',
            'stock' => 10,
                'image'=>'/upload/product/olahankacangkedelai/tahu-kuning.jpg',
                'categories_id'=>6,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tahu Kuning Kecil',
                'price'=>'9800',
                'unit' => '/10pcs',
            'stock' => 10,
                'image'=>'/upload/product/olahankacangkedelai/tahu-kuning.jpg',
                'categories_id'=>6,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tahu Putih Besar',
                'price'=>'9800',
                'unit' => '/10pcs',
            'stock' => 10,
                'image'=>'/upload/product/olahankacangkedelai/tahu-putih.jpg',
                'categories_id'=>6,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tahu Putih Kecil',
                'price'=>'7300',
                'unit' => '/10pcs',
            'stock' => 10,
                'image'=>'/upload/product/olahankacangkedelai/tahu-putih.jpg',
                'categories_id'=>6,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tempe Kecil',
                'price'=>'8500',
                'unit' => '/pc',
            'stock' => 10,
                'image'=>'/upload/product/olahankacangkedelai/tempe.jpg',
                'categories_id'=>6,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tempe Sedang',
                'price'=>'9800',
                'unit' => '/pc',
            'stock' => 10,
                'image'=>'/upload/product/olahankacangkedelai/tempe.jpg',
                'categories_id'=>6,
        ]);
        $i = $i + 1;
        DB::table('products')->insert([
            'uniq'=>$i,
            'name'=>'Tempe Besar',
                'price'=>'16100',
                'unit' => '/pc',
            'stock' => 10,
                'image'=>'/upload/product/olahankacangkedelai/tempe.jpg',
                'categories_id'=>6,
        ]);
        $i = $i + 1;

        $j = 1;
        for($k = 1; $k <= 9; $k++){
            FlashSale::insert([
                'uniq' => $i,
                'flashes_id' => 1,
                'products_id' => $j,
                'new_price' => 5000
            ]);
            $j+=3;
            $i++;
        }



        // // 
        // DB::table('products')->insert([
        //     // [
        //     //     'name'=>'anggur',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/buah/anggur.jpg',
        //     //     'categories_id'=>1,
        //     // ]
        //     // [
        //     //     'name'=>'apel',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/buah/apel.jpg',
        //     //     'categories_id'=>1,
        //     // ],
        //     // [
        //     //     'name'=>'pisang-dua',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/buah/pisang-dua.jpg',
        //     //     'categories_id'=>1,
        //     // ],
        //     // [
        //     //     'name'=>'pisang-satu',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/buah/pisang-satu.jpg',
        //     //     'categories_id'=>1,
        //     // ],
        //     // [
        //     //     'name'=>'stroberi-13',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/buah/stroberi-13.jpg',
        //     //     'categories_id'=>1,
        //     // ],
        //     // [
        //     //     'name'=>'stroberi-14',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/buah/stroberi-14.jpg',
        //     //     'categories_id'=>1,
        //     // ],
        //     // [
        //     //     'name'=>'stroberi-16',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/buah/stroberi-16.jpg',
        //     //     'categories_id'=>1,
        //     // ],
        //     // [
        //     //     'name'=>'stroberi-18',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/buah/stroberi-18.jpg',
        //     //     'categories_id'=>1,
        //     // ],
        //     // [
        //     //     'name'=>'stroberi-19',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/buah/stroberi-19.jpg',
        //     //     'categories_id'=>1,
        //     // ],
        //     // [
        //     //     'name'=>'Brokoli Putih',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/sayur/brokoli-putih.jpg',
        //     //     'categories_id'=>2,
        //     // ],
        //     // [
        //     //     'name'=>'jengkol',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/sayur/jengkol.jpg',
        //     //     'categories_id'=>2,
        //     // ],
        //     // [
        //     //     'name'=>'kale-dua',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/sayur/kale-dua.jpg',
        //     //     'categories_id'=>2,
        //     // ],
        //     // [
        //     //     'name'=>'mentimun',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/sayur/mentimun.jpg',
        //     //     'categories_id'=>2,
        //     // ],
        //     // [
        //     //     'name'=>'ubi-cilembu',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/sayur/ubi-cilembu.jpg',
        //     //     'categories_id'=>2,
        //     // ],
        //     // [
        //     //     'name'=>'Asin',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/asin.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'Bawal',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/bawal.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-dua-plain',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-dua-plain.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-dua',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-dua.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-empat-plain',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-empat-plain.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-empat',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-empat.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-lima-plain',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-lima-plain.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-lima',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-lima.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-satu-plain',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-satu-plain.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-satu',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-satu.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-tiga-plain',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-tiga-plain.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'daging-sapi-tiga',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/daging-sapi-tiga.jpg',
        //     //     'categories_id'=>3,
        //     // ],

        //     // [
        //     //     'name'=>'iga-dua',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/iga-dua.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'kulit',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/kulit.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'steak-dua-plain',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/steak-dua-plain.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'steak-dua',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/steak-dua.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'steak-empat-plain',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/steak-empat-plain.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'steak-empat',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/steak-empat.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'steak-plain',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/steak-plain.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'steak',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/daging/steak.jpg',
        //     //     'categories_id'=>3,
        //     // ],
        //     // [
        //     //     'name'=>'yoghurt2',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/yoghurt/yoghurt2.jpg',
        //     //     'categories_id'=>4,
        //     // ],
        //     // [
        //     //     'name'=>'yoghurt3',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/yoghurt/yoghurt3.jpg',
        //     //     'categories_id'=>4,
        //     // ],
        //     // [
        //     //     'name'=>'yoghurt4',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/yoghurt/yoghurt4.jpg',
        //     //     'categories_id'=>4,
        //     // ],
        //     // [
        //     //     'name'=>'yoghurt',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/yoghurt/yoghurt.jpg',
        //     //     'categories_id'=>4,
        //     // ],
        //     // [
        //     //     'name'=>'mie-basil-besar-kecil',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/ladanglima/mie-basil-besar-kecil.jpg',
        //     //     'categories_id'=>5,
        //     // ],
        //     // [
        //     //     'name'=>'mie-kale-leaves-besar-kecil',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/ladanglima/mie-kale-leaves-besar-kecil.jpg',
        //     //     'categories_id'=>5,
        //     // ],
        //     // [
        //     //     'name'=>'mie-tomat-besar-kecil',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/ladanglima/mie-tomat-besar-kecil.jpg',
        //     //     'categories_id'=>5,
        //     // ],
        //     // [
        //     //     'name'=>'gula-merah',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/gulamerah/gula-merah.jpg',
        //     //     'categories_id'=>6,
        //     // ],
        //     // [
        //     //     'name'=>'gula-merah-dua',
        //     //     'price'=>'1000',
        //     //     'unit' => 1,
        //     // 'stock' => 10,
        //     //     'image'=>'/upload/product/gulamerah/gula-merah-dua.jpg',
        //     //     'categories_id'=>6,
        //     // ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        //     [
                
        //     ],
        // ]);
        $i = $i + 1;
    }
}