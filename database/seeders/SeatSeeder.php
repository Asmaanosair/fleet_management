<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seats = [];

        for ($i = 1; $i <= 12; $i++) {
            $seatNo = 'seat_No_' . $i;
            $seats[] = ['seat' => $seatNo];
        }
        Seat::insert($seats);
    }
}
