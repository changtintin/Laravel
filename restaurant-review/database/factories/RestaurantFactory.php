<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(){
        $startDay = fake() -> dateTimeBetween('-2 years');
        $endDay = fake() -> dateTimeBetween($startDay, 'now');

        return [
            'name' => fake() -> company(),
            'location' => fake() -> state(),
            'created_at' => $startDay,
            'updated_at' => $endDay
        ];
    }
}
