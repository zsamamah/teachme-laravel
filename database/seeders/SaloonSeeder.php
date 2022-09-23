<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaloonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('saloons')->insert([
            'name'=>'Candace Lester',
            'owner_id'=>'2',
            'location'=>'Zarqa, Batrawi',
            'phone'=>'+1 (936) 879-4182',
            'profile_image'=>'https://thumbs.dreamstime.com/b/interior-hair-salon-barber-armchair-interior-modern-hair-salon-barber-armchair-free-space-177329490.jpg'
        ]);
        DB::table('reviews')->insert([
            [
                'range'=>'5',
                'saloon_id'=>'1',
                'user_id'=>'2'
            ],
            [
                'range'=>'4',
                'saloon_id'=>'1',
                'user_id'=>'3'
            ],
            [
                'range'=>'5',
                'saloon_id'=>'1',
                'user_id'=>'1'
            ]
            ]);
        DB::table('images')->insert([
            [
                'image'=>'https://images.squarespace-cdn.com/content/v1/5edee990a8696a7b8618fe6d/1592794368345-KP26O2DQ6O0SR8N0KOTN/DomMiguelPhotography6164+copy.jpg?format=2500w',
                'saloon_id'=>'1'
            ],
            [
                'image'=>'https://static.wixstatic.com/media/ba6473_7c73e982549b428498b4dd556e5ade6a~mv2.jpg/v1/fill/w_640,h_480,fp_0.47_0.92,lg_2,q_80,usm_0.66_1.00_0.01,enc_auto/ba6473_7c73e982549b428498b4dd556e5ade6a~mv2.jpg',
                'saloon_id'=>'1'
            ],
            [
                'image'=>'https://www.gigissalonspa.com/files/7716/5530/9165/SalonHeader.jpg',
                'saloon_id'=>'1'
            ],
            [
                'image'=>'https://thumbs.dreamstime.com/b/interior-hair-salon-barber-armchair-interior-modern-hair-salon-barber-armchair-free-space-177329490.jpg',
                'saloon_id'=>'1'
            ]
            ]);
        DB::table('services')->insert([
            [
                'material_id'=>'1',
                'saloon_id'=>'1',
                'price'=>'3.99'
            ],
            [
                'material_id'=>'8',
                'saloon_id'=>'1',
                'price'=>'9.99'
            ],
            [
                'material_id'=>'11',
                'saloon_id'=>'1',
                'price'=>'14.99'
            ],
            [
                'material_id'=>'12',
                'saloon_id'=>'1',
                'price'=>'4.99'
            ]
        ]);
    }
}
