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

        DB::table('plants')->truncate();
        DB::table('plants')->insert([
            ['name' => 'Zamiokulkas', 'latinName' => 'Zamioculcas zamiifolia', 'position' => 'Słoneczne/Pół cieniste', 'soil' => 'Próchnicze, przepuszczalne', 'watering' => 'Oszczędne','imgUrl' => 'https://images.pexels.com/photos/10194608/pexels-photo-10194608.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'],
            ['name' => 'Aloes leczniczy', 'latinName' => 'Aloe vera ', 'position' => 'Słoneczne', 'soil' => 'Lekka, przepuszczalna', 'watering' => 'Oszczędne','imgUrl' => 'https://cdn.pixabay.com/photo/2018/04/02/07/42/leaf-3283175_960_720.jpg'],
            ['name' => 'Bluszcz', 'latinName' => 'Hedera helix', 'position' => 'Półcień lub całkowite zacienienie', 'soil' => 'Dla roślin wilgociolubnych', 'watering' => 'Regularne, stale wilogtne podłoże','imgUrl' => 'https://images.pexels.com/photos/7728009/pexels-photo-7728009.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'],
            ['name' => 'Filodendron ', 'latinName' => 'Philodendron', 'position' => 'Półcień', 'soil' => 'Lekka, przepuszczalna z dodatkiem torfu', 'watering' => 'Regularne, stale wilogtne podłoże','imgUrl' => 'https://images.pexels.com/photos/9413775/pexels-photo-9413775.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['name' => 'Monstera', 'latinName' => 'Monstera', 'position' => 'Pół cieniste o rozproszonym świetle', 'soil' => 'Lekka, przepuszczalna z dodatkiem torfu', 'watering' => 'Regularne, stale wilogtne podłoże','imgUrl' => 'https://images.pexels.com/photos/6597437/pexels-photo-6597437.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['name' => 'Skrzydłokwiat', 'latinName' => 'Spathiphyllum', 'position' => 'Pół cieniste o rozproszonym świetle', 'soil' => 'Przepuszczalna, o odczynnie lekko kwaśnym', 'watering' => 'Regularne, stale wilogtne podłoże','imgUrl' => 'https://cdn.pixabay.com/photo/2019/06/12/14/14/peace-lilies-4269365_1280.jpg'],
            ['name' => 'Maranta', 'latinName' => 'Maranta leuconeura', 'position' => 'Pół cieniste o rozproszonym świetle', 'soil' => 'Lekka, przepuszczalna z dodatkiem torfu', 'watering' => 'Regularne, stale wilogtne podłoże','imgUrl' => 'https://images.unsplash.com/photo-1639756534497-d3271888337c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80'],
            ['name' => 'Pieniążek ', 'latinName' => 'Pilea peperomioides', 'position' => 'Jasne z rozproszonym światłem', 'soil' => 'wilgotne, dość żyzne podłoże', 'watering' => 'Regularne, stale wilogtne podłoże','imgUrl' => 'https://images.pexels.com/photos/6898560/pexels-photo-6898560.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'],
            ['name' => 'Jukka', 'latinName' => 'Yucca', 'position' => 'Słoneczne', 'soil' => 'Lekka, przepuszczalna', 'watering' => 'Oszczędne','imgUrl' => 'https://images.pexels.com/photos/10903301/pexels-photo-10903301.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'],
            ['name' => 'Szlumbergera, zygokaktus, kaktus bożonarodzeniowy', 'latinName' => 'Schlumbergera', 'position' => 'słońce, półcień', 'soil' => 'Lekka, przepuszczalna', 'watering' => 'Oszczędne','imgUrl' => 'https://cdn.pixabay.com/photo/2018/01/23/16/10/plant-3101751_1280.jpg'],
        ]);
    }
}
