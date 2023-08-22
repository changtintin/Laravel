<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Carbon\Carbon;


class RestaurantController extends Controller
{
    /*                
        MY NOTE    
        =====================================================================
        _ when($var, function())
            * if $var != null, it'd excutes the function()

        _ nameFinder(): local scope

        _ input():  input method may be used to retrieve user input:
    */

    public function index(Request $request){

        $name = $request -> input('name');

        $filter = $request -> input('filter', '');
    
        $restaurants = Restaurant::when(

            $name, 

            function($query, $name){

                return $query -> nameFinder($name);
        }); 


        $dateMsg = match ($filter){

            'popular_last_month', 'highest_rated_last_month' =>  now() -> subMonths()->startOfMonth()->toFormattedDayDateString()
            . " ~ " . now() -> subMonths()->endOfMonth()->toFormattedDayDateString(),

            'popular_last_6month' , 'highest_rated_last_6month'=> now() -> subMonths(6)->startOfMonth()->toFormattedDayDateString()
            . " ~ " . now() -> startOfMonth()->toFormattedDayDateString(),

            default => '~ ' . now()->toFormattedDayDateString()
        };

        $restaurants = match ($filter) {     
                   
            'popular_last_month' => $restaurants -> popularLastMonth(),

            'popular_last_6month' => $restaurants -> popularLast6Months(),

            'highest_rated_last_month' => $restaurants -> highestRatedLastMonth(),  

            'highest_rated_last_6month' => $restaurants -> highestRatedLast6Months(),

            default => $restaurants -> latest()
        };

        $restaurants = $restaurants -> get();

        

        return view('restaurants.index', ['restaurants' => $restaurants, 'dateMsg' => $dateMsg ]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant){

        /* 
            MY NOTE    
            ===================================================================== 
            _ latest(): all of the data sorted by the time in desc order
            _ load(): Avoid lazy loading in laravel to load every review even not belong to this 
        */
        
        return view('restaurants.show', [
            'restaurant' => $restaurant -> load([
                'reviews' => fn($query) => $query ->latest()
            ]),
            'sorted' => 'Latest'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
