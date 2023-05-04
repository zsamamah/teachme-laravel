<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $id=1;
        DB::table('details')->insert([
            [
                'user_id' => $id++,
                'city' => 'Amman',
                'major' => null
            ],
            [
                'user_id' => $id++,
                'city' => 'Amman',
                'major' => null
            ],
            [
                'user_id' => $id++,
                'city' => 'Amman',
                'major' => 'Math'
            ]
        ]);

        for ($i=0; $i < 10; $i++) { 
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'role' => 'teacher',
                'password' => Hash::make('123321'),
            ]);   
        }

        for ($i=0; $i < 5; $i++) { 
            DB::table('details')->insert([
                'user_id' => $id++,
                'city' => 'Amman',
                'major' => 'Math'
            ]);   
        }
        for ($i=0; $i < 5; $i++) { 
            DB::table('details')->insert([
                'user_id' => $id++,
                'city' => 'Irbid',
                'major' => 'Math'
            ]);   
        }
    }
}
