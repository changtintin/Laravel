<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'restaurant_id' => null,
            'review' => fake() -> realText(70, 2),
            'rating' => fake() -> numberBetween(1, 5),
            'created_at' => $startDay,
            'updated_at' => $endDay
        ];
    }

    public function good(){
        return $this -> state(function(array $attributes){
            return [
                'rating' => fake() -> numberBetween(1, 3)
            ];
        });
    }

    public function average(){
        return $this -> state(function(array $attributes){
            return [
                'rating' => fake() -> numberBetween(2, 5)
            ];
        });
    }

    public function bad(){
        return $this -> state(function(array $attributes){
            return [
                'rating' => fake() -> numberBetween(4, 5)
            ];
        });
    }
}
