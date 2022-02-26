<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name'  =>  'T-shart',
            'product_code'  =>  'au120',
            'category_id'   =>  3,
            'product_qty'   =>  50,
            'product_price' =>  200,
            'product_cost'  =>  120,
            'product_des'   =>  'This product is best in online product',
            'product_image' =>  'not-available.png',
        ]);
    }
}
