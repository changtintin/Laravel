<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
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

Route::get('/test', function () {
    return view('test');
});

/*                
    MY NOTE    
    =====================================================================
    _ Creates multiple routes to handle a variety of actions on the resource
    _ The generated controller will already have methods stubbed for each of these actions
        * Details are in command "php artisan route:list"

*/

Route::resource('restaurants', RestaurantController::class);