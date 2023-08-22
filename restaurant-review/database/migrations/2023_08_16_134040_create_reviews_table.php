<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('reviews', function (Blueprint $table) {
            $table -> id();
            $table -> unsignedBigInteger('restaurant_id');
            $table -> text('review');
            $table -> unsignedTinyInteger('rating');
            $table -> timestamps();
            $table -> foreign('restaurant_id') -> references('id') -> on('restaurants') -> onDelete('cascade');  

            /*                
                MY NOTE    
                =====================================================================
                _ Set foreign key
            */
            // $table -> foreignId('rest_id') -> constrained() -> cascadeOnDelete();          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
