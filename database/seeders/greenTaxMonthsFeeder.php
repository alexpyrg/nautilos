<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class greenTaxMonthsFeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('green_tax')->insert([
            'cost' => 0.50,
            'month' => 1,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 0.50,
            'month' => 2,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 1.50,
            'month' => 3,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 1.50,
            'month' => 4,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 1.50,
            'month' => 5,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 1.50,
            'month' => 6,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 1.50,
            'month' => 7,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 1.50,
            'month' => 8,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 1.50,
            'month' => 9,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 1.50,
            'month' => 10,
        ]);


        DB::table('green_tax')->insert([
            'cost' => 0.50,
            'month' => 11,
        ]);

        DB::table('green_tax')->insert([
            'cost' => 0.50,
            'month' => 12,
        ]);
    }
}
