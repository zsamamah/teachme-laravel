<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Generator\StringManipulation\Pass\Pass;

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
                'password'=>Hash::make('12344321')
            ],
            [
                'name'=>'Mohammad Khalayleh',
                'email'=>'mo_khalayleh@yahoo.com',
                'password'=>Hash::make('12344321')
            ],
            [
                'name'=>'Zaid Samamah',
                'email'=>'zsamamah@yahoo.com',
                'password'=>Hash::make('12344321')
            ]
            ]);
    }
}
