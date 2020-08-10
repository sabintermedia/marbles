<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ColorsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      $faker = Faker::create();
      $colorsArray = [];
      for ($i=1; $i<= 10; $i++) {
          $productsArray[] = [
              'color' => $faker->unique()->safeColorName,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ];
      }
      DB::table('colors')->truncate();
      DB::table('colors')->insert($productsArray);
  }

}
