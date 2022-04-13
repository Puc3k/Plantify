<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PlantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('plants')->truncate();

        $positions = ['Bezpośrednie światło','Światło jasne, rozproszone','Półcień i cień'];

        for($j = 0; $j<1;$j++)
        {
            $plants = [];
            for($i = 0; $i < 20; $i++)
            {
                $plants[] =[
                    'name'=> $faker->name(),
                    'latinName' => $faker->words($faker->numberBetween(2, 5), true),
                    'position'=> $positions[rand(0,2)],
                    'soil' => $faker->slug(2),
                    'watering'=> $faker->slug(2),
                    'humidity'=> $faker->slug(2),
                    'imgUrl'=> $faker->imageUrl(100,100, 'plants'),
                ];
            }
        }
        DB::table('plants')->insert($plants);
    }
}
