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
            'name'=>'Care Beauty',
            'owner_id'=>'2',
            'location'=>'Zarqa, Batrawi',
            'phone'=>'+962798564321',
            'profile_image'=>'https://media.gettyimages.com/photos/barber-styling-senior-males-beard-picture-id1227512439?s=612x612'
        ]);
    }
}
