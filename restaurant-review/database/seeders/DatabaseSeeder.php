<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::factory(33) -> create() -> each(function($restaurant){
            $numReviews = random_int(5, 30);
            Review::factory() -> count($numReviews) -> good() -> for($restaurant) -> create();
        });

        Restaurant::factory(33) -> create() -> each(function($restaurant){
            $numReviews = random_int(5, 30);
            Review::factory() -> count($numReviews) -> bad() -> for($restaurant) -> create();
        });

        Restaurant::factory(34) -> create() -> each(function($restaurant){
            $numReviews = random_int(5, 30);
            Review::factory() -> count($numReviews) -> average() -> for($restaurant) -> create();
        });
    }
}
