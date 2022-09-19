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
                'name'=>'Mays Beauty',
                'email'=>'mays@yahoo.com',
                'role'=>'provider',
                'password'=>Hash::make('123321')
            ],
            [
                'name'=>'Zaid Samamah',
                'email'=>'zsamamah@yahoo.com',
                'role'=>'user',
                'password'=>Hash::make('123321')
            ]
        ]);
    }
}
