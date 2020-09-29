<?php

use Illuminate\Database\Seeder;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Sport::firstOrCreate(['name' => 'Futebol', 'description' => 'Futebol']);
        App\Models\Sport::firstOrCreate(['name' => 'Futsal', 'description' => 'Futsal']);
        App\Models\Sport::firstOrCreate(['name' => 'Vôlei', 'description' => 'Vôlei']);
        App\Models\Sport::firstOrCreate(['name' => 'SoftBall', 'description' => 'SoftBall']);
        App\Models\Sport::firstOrCreate(['name' => 'Tênis', 'description' => 'Tênis']);
    }
}
