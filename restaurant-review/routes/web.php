<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;

use App\Models\Review;

use function PHPUnit\Framework\once;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect() -> route('restaurants.index');
});

/*                
    MY NOTE    
    =====================================================================

    _ Creates multiple routes to handle a variety of actions on the resource

    _ The generated controller will already have methods stubbed for each of these actions
        * Details are in command "php artisan route:list"

    _ only(): specify the name of used actions

    _ reviews is depend on restaurants existence

*/

Route::resource('restaurants', RestaurantController::class)
-> only(['index', 'show']);

Route::resource('restaurants.reviews', ReviewController::class)
-> scoped(['review' => 'restaurant'])
-> only(['create', 'store']);
