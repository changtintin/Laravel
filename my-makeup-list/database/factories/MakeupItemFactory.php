<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MakeupItem>
 */
class MakeupItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() -> sentence,
            'type'=> fake() -> sentence(3),
            'description'=> fake() -> optional() -> paragraph(5, true),
            'price'=> fake() -> randomNumber(4, false),
            'bought'=> fake() -> boolean
        ];
    }

    public function forOilySkin():static{
        return $this -> state( fn(array $attributes) => [
            'description' => 'For Oily Skin'
        ]);
    }
}
