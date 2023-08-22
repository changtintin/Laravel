<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
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
}
