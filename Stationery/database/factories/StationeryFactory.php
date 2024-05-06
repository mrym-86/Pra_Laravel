<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stationery>
 */
class StationeryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->realText(10),
            'price'=>$this->faker->numberBetween($min=50,$max=999),
            'classification'=>$this->faker->numberBetween($min=1,$max=3),
            'details'=>$this->faker->realText(50),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>null
        ];
    }
}
