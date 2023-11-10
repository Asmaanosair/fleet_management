<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = [
            ['station_id'=>Station::whereStation('Cairo')->first()->id],
            ['station_id'=>Station::whereStation('Giza')->first()->id,'sequence'=>1],
            ['station_id'=>Station::whereStation('AlFayyum')->first()->id,'sequence'=>2],
            ['station_id'=>Station::whereStation('AlMinya')->first()->id,'sequence'=>3],
            ['station_id'=>Station::whereStation('Asyut')->first()->id,'sequence'=>4],
        ];
        $trip=Trip::first();
        $trip->destination()->createMany($stations);
    }
}
