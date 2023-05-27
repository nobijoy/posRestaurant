<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $publicPath = public_path('uploads/image');

        for ($i = 0; $i < 30; $i++) { // Change the number of records as per your requirement
            $imageName = $faker->image($publicPath, 300, 300, 'food', false);
            $imageUrl = asset('uploads/image/' . $imageName);

            DB::table('menus')->insert([
                'name' => $faker->word,
                'code' => $faker->unique()->randomNumber(4),
                'category' => $faker->numberBetween(1, 13),
                'price' => $faker->randomFloat(2, 1, 100),
                'description' => $faker->sentence,
                'image' => $imageUrl,
                'is_veg' => $faker->boolean,
                'is_bev' => $faker->boolean,
                'is_bar' => $faker->boolean,
                'is_active' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
