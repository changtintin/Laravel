<?php

namespace App\Models;

/*                
    MY NOTE    
    =====================================================================
    _ Query Builder
        * Used to perform most database operations in your application
*/

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Restaurant extends Model{
    use HasFactory;
    public function reviews(){

        /*                
            MY NOTE    
            =====================================================================
            _ Set one to many relationship
            _ Many reviews toward a restaurant
        */

        return $this -> hasMany(Review::class);
    }

    public function scopeNameFinder(Builder $query, string $name): Builder{

        return $query -> where('name', 'LIKE', '%' . $name . '%');

    }

    //Number of review the restaurant received in the date range (from -> to)
    public function scopePopular(Builder $query, $from = null, $to = null): Builder | QueryBuilder {

        /*                
            MY NOTE    
            =====================================================================
            _ Don't use $this instead of $query here

            _ Number of review the restaurant received in the date range (from -> to)

            _ Set variable $from, $to to null means it is optional

            _ fn()
                * Short Arrow Functions
                * Only allows one statement

            _ The code below returns the result of "$this -> dateRangeFilter($q, $from, $to)"
        */

        return $query -> withCount([ 

            'reviews' => fn(Builder $q) => $this -> dateRangeFilter($q, $from, $to)

        ]) -> orderBy('reviews_count', 'desc');
    }

    //Average rating in the specify date range 
    public function scopeHighestRated(Builder $query, $from = null, $to = null): Builder | QueryBuilder{
        
        return $query -> withAvg(['reviews' => fn(Builder $q) => $this -> dateRangeFilter($q, $from, $to)], 'rating') 
        -> orderBy('reviews_avg_rating', 'desc');
        
    }

    public function scopeMinReviews(Builder $query, int $minReviews):  Builder | QueryBuilder{

        return $query -> having('reviews_count', '>=', $minReviews);

    }

    private function dateRangeFilter(Builder $query, $from =null, $to = null){

        /*                
            MY NOTE    
            =====================================================================
            _ No needs to return anything, because object $query is return by reference not by copy

        */

        if($from && !$to){                    

            $query -> where('created_at', '>=', $from);

        }
        elseif(!$from && $to){

            $query -> where('created_at', '<=', $to);

        }
        elseif($from && $to){

            $query -> whereBetween('created_at', [$from, $to]);

        }     
    }

    public function scopePopularLastMonth(Builder $query): Builder | QueryBuilder{

        $start = new Carbon('first day of last month');
        
        $end = new Carbon('last day of last month');

        return $query -> popular($start, $end) -> highestRated($start, $end) -> minReviews(2);
    }

    public function scopePopularLast6Months(Builder $query): Builder | QueryBuilder{

        $start = now() -> subMonths(6) -> startOfMonth();

        $end =  now() -> startOfMonth();

        return $query -> popular($start, $end) -> highestRated($start, $end) -> minReviews(5);
    }

    public function scopeHighestRatedLastMonth(Builder $query): Builder | QueryBuilder{

        $start = new Carbon('first day of last month');
        
        $end = new Carbon('last day of last month');

        return $query -> highestRated($start, $end) -> popular($start, $end) -> minReviews(2);
    }

    public function scopeHighestRatedLast6Months(Builder $query): Builder | QueryBuilder{
        
        $start = now() -> subMonths(6) -> startOfMonth();
        
        $end =  now() -> startOfMonth();

        return $query -> highestRated($start, $end) -> popular($start, $end) ->  minReviews(5);
    }
}
