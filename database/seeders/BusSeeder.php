<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bus = [
            ['bus'=>"Bus_No_1"],
            ['bus'=>"Bus_No_2"],
        ];
        $trip=Trip::first();
        $trip->bus()->createMany($bus);
    }
}
