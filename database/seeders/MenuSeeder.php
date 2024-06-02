<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data menu
        $menu = [
            [
                'menu' => 'Nasi Goreng Ayam',
                'harga' => '15000',
            ],
            [
                'menu' => 'Mi Goreng Ayam',
                'harga' => '15000',
            ],
            [
                'menu' => 'Es Teh',
                'harga' => '5000',
            ],
            [
                'menu' => 'Es Jeruk',
                'harga' => '7000',
            ],
        ];
        // Insert data into the menu table
        DB::table('menu')->insert($menu);
        //
    }
}
