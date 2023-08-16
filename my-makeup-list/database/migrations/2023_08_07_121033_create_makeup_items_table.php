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
        Schema::create('makeup_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table -> string('name');
            $table -> text('type');
            $table -> text('description') -> nullable();
            $table -> integer('price');
            $table -> boolean('bought');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('makeup_items');
    }
};
