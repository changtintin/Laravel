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
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {

            /*
                MY NOTE    
                =====================================================================
                _ id() = primary key in database
                _ timestamps() = create at / update at
                    * automated updated when the model is adjusted
            */
            
            $table->id();
            $table->string('title');
            $table -> text('description');
            $table -> text('long_description') -> nullable();
            $table -> boolean('completed') -> default(false);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
