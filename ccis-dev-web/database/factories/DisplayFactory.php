<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Display>
 */
class DisplayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(300),
            'status' => $this->faker->word(),
            'date' => $this->faker->date(),

            'appendix' => $this->faker->randomElement(
                [
                    "a",
                    "b",
                    "c",
                    'house',
                    'flat', 
                    'apartment'
                ]
            ),
            'cover' => $this->faker->randomElement(
                [
                    "a",
                    "b",
                    "c",
                    'house',
                    'flat', 
                    'apartment'
                ]
            )            
        ];
    }
}
