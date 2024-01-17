<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $houses =[
            0 => [
                0 => 'The Victoria',
                1 => '374662',
                2 => '4',
                3 => '2',
                4 => '2',
                5 => '2',
            ],
            1 => [
                0 => 'The Xavier',
                1 => '513268',
                2 => '4',
                3 => '2',
                4 => '1',
                5 => '2',
            ],
            2 => [
                0 => 'The Como',
                1 => '454990',
                2 => '4',
                3 => '3',
                4 => '2',
                5 => '3',
            ],
            3 => [
                0 => 'The Aspen',
                1 => '384356',
                2 => '4',
                3 => '2',
                4 => '2',
                5 => '2',
            ],
            4 => [
                0 => 'The Lucretia',
                1 => '572002',
                2 => '4',
                3 => '3',
                4 => '2',
                5 => '2',
            ],
            5 => [
                0 => 'The Toorak',
                1 => '521951',
                2 => '5',
                3 => '2',
                4 => '1',
                5 => '2',
            ],
            6 => [
                0 => 'The Skyscape',
                1 => '263604',
                2 => '3',
                3 => '2',
                4 => '2',
                5 => '2',
            ],
            7 => [
                0 => 'The Clifton',
                1 => '386103',
                2 => '3',
                3 => '2',
                4 => '1',
                5 => '1',
            ],
            8 => [
                0 => 'The Geneva',
                1 => '390600',
                2 => '4',
                3 => '3',
                4 => '2',
                5 => '2',
            ],
        ];

        foreach($houses as $house){
            DB::table('houses')->insert([
                'name' => $house[0],
                'price' => $house[1],
                'bedrooms' => $house[2],
                'bathrooms' => $house[3],
                'storeys' => $house[4],
                'garages' => $house[5],
            ]);
        }
    }
}
