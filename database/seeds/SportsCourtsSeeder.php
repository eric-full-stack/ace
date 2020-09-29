<?php

use Illuminate\Database\Seeder;

class SportsCourtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\SportCourt::firstOrCreate(['name' => 'Quadra de futebol']);
        App\Models\SportCourt::firstOrCreate(['name' => 'Campo de futebol']);
        App\Models\SportCourt::firstOrCreate(['name' => 'Quadra de vôlei']);
        App\Models\SportCourt::firstOrCreate(['name' => 'Campo de SoftBall']);
        App\Models\SportCourt::firstOrCreate(['name' => 'Quadra de tênis']);
    }
}
