<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FAQ>
 */
class FAQFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $increment = 1;
        return [
             
            'question'=>$this->faker->unique()->sentence(),
            'answer'=>$this->faker->text(),
            'rank'=> $increment++
        ];
    }
}
