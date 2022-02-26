<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name'  =>  $this->faker->name(),
            'product_code'  =>  'SKU'.$this->faker->unique()->randomNumber(5,'50000'),
            'category_id'   =>  $this->faker->numberBetween(1,3),
            'product_qty'   =>  $this->faker->numberBetween(50,250),
            'product_price' =>  $this->faker->numberBetween(250,2000),
            'product_cost'  =>  $this->faker->numberBetween(150,1200),
            'product_des'   =>  $this->faker->realText(250),
            'product_image' =>  'not-available.png',
        ];


    }
}
