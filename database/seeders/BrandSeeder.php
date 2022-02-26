<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'new 1',
            'details' => 'nothing',
            'photo' =>  'not-available.png'
        ]);
        Brand::create([
            'name' => 'new 2',
            'details' => 'nothing',
            'photo' =>  'not-available.png'
        ]);
        Brand::create([
            'name' => 'new 3',
            'details' => 'nothing',
            'photo' =>  'not-available.png'
        ]);
        Brand::create([
            'name' => 'new4',
            'details' => 'nothing',
            'photo' =>  'not-available.png'
        ]);
    }
}
