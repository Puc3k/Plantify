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

        $path = base_path() . '/database/plants.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
