<?php

namespace Database\Seeders;

use App\Models\HalamanStore;
use App\Models\Keyword;
use App\Models\Link;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Promo;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        User::create([
            'name' => 'Drajat Cahya Diningrat',
            'email' => 'drajat@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Cahaya Mentari',
            'email' => 'mentari@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Ratari',
            'email' => 'tari@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        // User::factory(5)->create();

        // Link::factory(5)->create();

        Promo::create([
            'jenis' => 'Diskon',
            'slug' => 'diskon'
        ]);

        Promo::create([
            'jenis' => 'Cashback',
            'slug' => 'cashback'
        ]);

        // Promo::create([
        //     'jenis' => 'Buy 1 Get 1',
        //     'slug' => 'buy-1-get-1'
        // ]);

        // Promo::create([
        //     'jenis' => 'Lainnya',
        //     'slug' => 'lainnya'
        // ]);

        // Keyword::create([
        //     'name_key' => '#BurgerMurah'
        // ]);

        // Keyword::create([
        //     'name_key' => '#DiskonBurger'
        // ]);
        // HalamanStore::create([
        //     'name' => 'Info Makanan Murah',
        //     'description' => 'Tempat menyediakan informasi-informasi seputar makanan murah yang ada diindonesia',
        //     'negara' => 'Indonesia',
        //     'provinsi' => 'Jawa Barat',
        //     'kota_kabupaten' => 'Bandung',
        //     'alamat_lengkap' => 'Jl Raya Bandung-Garut Km. 10',
        //     'user_id' => 1
        // ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Hot Dog',
        //     'slug' => 'hot-dog',
        //     'image' => 'hotdog.jpg',
        //     'description' => 'Hot dog adalah suatu jenis sosis yang dimasak atau diasapi dan memiliki tekstur yang lebih halus serta rasa yang lebih lembut dan basah daripada kebanyakan sosis',
        //     'original_price' => '60.000',
        //     'promo_price' => '30.000',
        //     'lokasi' => 'Cimahi',
        //     'syarat_ketentuan' => 'Member Only',
        //     'promo_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Burger Original',
        //     'slug' => 'burger-original',
        //     'image' => 'burger.png',
        //     'description' => 'Burger Original yaitu Roti Bulat dibelah dua yang didalamnya ada isi daging, tomat, bawang bombay, dan salad.',
        //     'original_price' => '40.000',
        //     'promo_price' => '20.000',
        //     'lokasi' => 'Kota Bandung',
        //     'syarat_ketentuan' => 'Member Only',
        //     'promo_id' => 1,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Burger Dulaxe',
        //     'slug' => 'burger-dulaxe',
        //     'image' => 'burger.png',
        //     'description' => 'Burger Dulaxe yaitu Roti Bulat dibelah dua yang didalamnya ada isi daging, tomat, bawang bombay, dan salad.',
        //     'original_price' => '50.000',
        //     'promo_price' => '25.000',
        //     'lokasi' => 'Kab. Bandung',
        //     'syarat_ketentuan' => 'Member Only',
        //     'promo_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Burger Keju',
        //     'slug' => 'burger-keju',
        //     'image' => 'burger.png',
        //     'description' => 'Burger Keju yaitu Roti Bulat dibelah dua yang didalamnya ada isi daging, tomat, bawang bombay, keju, dan salad.',
        //     'original_price' => '55.000',
        //     'promo_price' => '27.500',
        //     'lokasi' => 'Kab. Garut',
        //     'syarat_ketentuan' => 'Member Only',
        //     'promo_id' => 3,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Burger Large',
        //     'slug' => 'burger-Large',
        //     'image' => 'burger.png',
        //     'description' => 'Burger Large yaitu Roti Bulat dibelah dua yang didalamnya ada isi daging, tomat, bawang bombay, keju, dan salad.',
        //     'original_price' => '65.000',
        //     'promo_price' => '32.500',
        //     'lokasi' => 'Jakarta',
        //     'syarat_ketentuan' => 'Member Only',
        //     'promo_id' => 4,
        //     'user_id' => 1
        // ]);
    }
}
