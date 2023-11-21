<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Review extends Model{

    use HasFactory;

    protected $fillable = ['review', 'rating'];

    public function restaurant(){

        /*                
            MY NOTE    
            =====================================================================
            _ Set one to many relationship 
            _ Many reviews toward a restaurant INVERTLY
        */

        return $this -> belongsTo(Restaurant::class);
    }

    /*                
        MY NOTE    
        =====================================================================
        _ Forget the cache when the review is updated

        _ https://laravel.com/docs/10.x/eloquent#events

        _ static::updated() won't be triggered using raw SQL or mass assignment 
        to update the database as well as rollback the database transaction

            * if u just load the model and change its property, it'll be triggered
    */

    protected static function booted(){

        static::updated(fn(Review $review) => cache() -> forget('restaurant:'.$review -> restaurant_id));

        static::deleted(fn(Review $review) => cache() -> forget('restaurant:'.$review -> restaurant_id));

    }
}
