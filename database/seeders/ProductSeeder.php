<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'product_name' => 'PAPAYA',
                'product_price' => '12000',
                'product_img' => 'product-1.jpg',
                'product_color' => 'Green',
                'product_description' => 'Papaya is a delicious tropical fruit native to northern Mexico, it is also known as the "sun orange".',
                'product_feature' => '1',
                'stock' => '30',
                'sale_amount' => '12',
                'expire_date' => '2022-04-30',
                'manufacture_id' => '1',
                'type_id' => '1',
                'comment_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
    
            ],
            [
                'product_name' => 'MANGO',
                'product_price' => '20000',
                'product_img' => 'product-3.jpg',
                'product_color' => 'Yellow',
                'product_description' => 'Mango is a tropical evergreen tree that grows up to 20 meters tall. The fruit is oval and yellow in color. The pulp of the fruit is dense and juicy, with a sweet taste',
                'product_feature' => '1',
                'stock' => '20',
                'sale_amount' => '19',
                'expire_date' => '2022-04-24',
                'manufacture_id' => '2',
                'type_id' => '2',
                'comment_id' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'ORANGE',
                'product_price' => '9000',
                'product_img' => 'product-4.jpg',
                'product_color' => 'Green',
                'product_description' => 'Orange (lat.Citrus sinensis) is a fruit tree of the genus Citrus of the Rute family, one of the most common citrus trees in the tropics and subtropics.',
                'product_feature' => '1',
                'stock' => '80',
                'sale_amount' => '42',
                'expire_date' => '2022-04-22',
                'manufacture_id' => '2',
                'type_id' => '1',
                'comment_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'DILL',
                'product_price' => '5000',
                'product_img' => 'product-5.jpg',
                'product_color' => 'Green',
                'product_description' => 'It is a perennial herb that belongs to the celery family. Stems are straight, slender, with white flowers. The tree can reach 3 meters in height.',
                'product_feature' => '0',
                'stock' => '40',
                'sale_amount' => '22',
                'expire_date' => '2022-04-22',
                'manufacture_id' => '3',
                'type_id' => '1',
                'comment_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'CARROT',
                'product_price' => '10000',
                'product_img' => 'product-6.jpg',
                'product_color' => 'Green',
                'product_description' => 'Eating carrots contains vitamin A, vitamin C, carotenoids, potassium and antioxidants, not only good for eyes, but also gives you healthy skin,',
                'product_feature' => '1',
                'stock' => '30',
                'sale_amount' => '32',
                'expire_date' => '2022-04-20',
                'manufacture_id' => '2',
                'type_id' => '1',
                'comment_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'GREEN BEAN',
                'product_price' => '20000',
                'product_img' => 'product-7.jpg',
                'product_color' => 'Green',
                'product_description' => 'The bright green cylindrical seeds are 4 to 6 mm long, 3.5 to 4.5 mm in diameter. The seed umbilicus running along the length of the seed is bright white.',
                'product_feature' => '0',
                'stock' => '100',
                'sale_amount' => '82',
                'expire_date' => '2022-04-26',
                'manufacture_id' => '2',
                'type_id' => '2',
                'comment_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'AVOCADO',
                'product_price' => '15000',
                'product_img' => 'product-8.jpg',
                'product_color' => 'Green',
                'product_description' => 'An avocado is a bright green fruit with a large pit and dark leathery skin. They re also known as alligator pears or butter fruit.',
                'product_feature' => '1',
                'stock' => '50',
                'sale_amount' => '20',
                'expire_date' => '2022-06-26',
                'manufacture_id' => '3',
                'type_id' => '2',
                'comment_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'COCONUT KUMQUAT',
                'product_price' => '14900',
                'product_img' => 'product-9.jpg',
                'product_color' => 'Green',
                'product_description' => 'Coconut and kumquat juice is a cooling beverage easy to drink, and beneficial to health. Enjoying a glass of fresh coconut kumquat juice in such hot weather will be very interesting.',
                'product_feature' => '0',
                'stock' => '10',
                'sale_amount' => '6',
                'expire_date' => '2022-06-22',
                'manufacture_id' => '1',
                'type_id' => '3',
                'comment_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'AVOCADO SMOTHIES',
                'product_price' => '20000',
                'product_img' => 'product-10.jpg',
                'product_color' => 'Green',
                'product_description' => 'It s sweet, thick and creamy and tastes like an avocado-flavored milkshake. The traditional version uses a lot of condensed milk to sweeten the drink and create a thick milkshake-like texture.',
                'product_feature' => '1',
                'stock' => '30',
                'sale_amount' => '14',
                'expire_date' => '2022-06-22',
                'manufacture_id' => '2',
                'type_id' => '3',
                'comment_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'BLUEBERRY SMOTHIES',
                'product_price' => '25000',
                'product_img' => 'product-11.jpg',
                'product_color' => 'Green',
                'product_description' => 'A protein smoothie is a combination of water or some form of dairy product, protein powder, fruits, and vegetables. They can be consumed any part of the day and are used as protein ',
                'product_feature' => '1',
                'stock' => '30',
                'sale_amount' => '14',
                'expire_date' => '2022-06-12',
                'manufacture_id' => '2',
                'type_id' => '3',
                'comment_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'DRAGONFRUIT',
                'product_price' => '10000',
                'product_img' => 'product-12.jpg',
                'product_color' => 'Green',
                'product_description' => 'Central Americans call it pitaya. In Asia, its a strawberry pear. Today, you can buy dragon fruit throughout the U.S.',
                'product_feature' => '1',
                'stock' => '30',
                'sale_amount' => '14',
                'expire_date' => '2022-06-12',
                'manufacture_id' => '2',
                'type_id' => '2',
                'comment_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
