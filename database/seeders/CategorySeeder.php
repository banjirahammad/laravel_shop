<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Hijab',
            'slug' => 'hijab',
            'details' => 'Hijab',
            'status' => 1,
        ]);
        Category::create([
            'name' => 'Rasmi',
            'slug' => 'rasmi',
            'details' => 'rasmi',
            'status' => 1,
        ]);
        Category::create([
            'name' => 'Erani Hijab',
            'slug' => 'erani_hijab',
            'details' => 'Hijab',
            'status' => 1,
        ]);
    }
}
