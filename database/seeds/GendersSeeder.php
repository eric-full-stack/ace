<?php

use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Gender::firstOrCreate(['name' => 'Masculino']);
        App\Models\Gender::firstOrCreate(['name' => 'Feminino']);
        App\Models\Gender::firstOrCreate(['name' => 'Outro']);
    }
}
