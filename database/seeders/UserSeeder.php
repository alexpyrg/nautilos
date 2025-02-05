<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Admin',
            'password' => Hash::make('adminPassword1234'),
            'email' => 'testmail@examplemail',
            'type'=> 'beginner',
        ]);
        DB::table('users')->insert([
            'username' => 'Super',
            'password' => Hash::make('superPassword1234'),
            'email' => 'testmail1@examplemail1',
            'type'=> 'developer',
        ]);

        DB::table('business_info')->insert([
            'name' => 'Change me',
            'address' => 'Change me addr.',
            'phone' => 'Change me phone.',
            'email' => 'chang_me@mail',
            'analytics_id' => '',
            'rate_calculation' => 'month'
        ]);
    }
}
