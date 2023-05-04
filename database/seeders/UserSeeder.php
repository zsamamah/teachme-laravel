<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Admin Admin',
                'email'=>'admin@admin.com',
                'role'=>'admin',
                'password'=>Hash::make('123321')
            ],
            [
                'name'=>'Zaid Samamah',
                'email'=>'zaid@yahoo.com',
                'role'=>'student',
                'password'=>Hash::make('123321')
            ],
            [
                'name'=>'Yazan Dweik',
                'email'=>'yazan@yahoo.com',
                'role'=>'teacher',
                'password'=>Hash::make('123321')
            ]
        ]);
        DB::table('details')->insert([
            [
                'user_id' => '1',
                'city' => 'Amman'
            ],
            [
                'user_id' => '2',
                'city' => 'Amman'
            ],
            [
                'user_id' => '3',
                'city' => 'Amman'
            ]
        ]);
    }
}
