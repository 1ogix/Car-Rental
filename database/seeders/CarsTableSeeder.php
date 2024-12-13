<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("cars")->insert([
            [
                'name' => 'Toyota Corolla',
                'model' => '2023',
                'plate_number' => 'ABC-1234',
                'image' => 'car_images/toyotacorolla.png',
            ],
            [
                'name' => 'Honda Civic',
                'model' => '2022',
                'plate_number' => 'XYZ-5678',
                'image' => 'car_images/hondacivic.png',
            ],
            [
                'name' => 'Ford Mustang',
                'model' => '2023',
                'plate_number' => 'LMN-9012',
                'image' => 'car_images/fordmustang.png',
            ],
        ]);
    }
}
