<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('materials')->insert([
      [
        'm_name' => 'Hair'
      ],
      [
        'm_name' => 'Hair dye'
      ],
      [
        'm_name' => 'Hairstyle'
      ],
      [
        'm_name' => 'Hair dryer'
      ],
      [
        'm_name' => 'Curly Hair'
      ],
      [
        'm_name' => 'Treatment'
      ],
      [
        'm_name' => 'Keratin'
      ],
      [
        'm_name' => 'Protein'
      ],
      [
        'm_name' => 'Face Cleaning'
      ],
      [
        'm_name' => 'Makeup'
      ],
      [
        'm_name' => 'Body'
      ],
      [
        'm_name' => 'Nails'
      ],
    ]);
  }
}
