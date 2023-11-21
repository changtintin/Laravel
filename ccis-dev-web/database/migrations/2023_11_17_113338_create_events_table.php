<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {            
            $table -> id() -> autoIncrement() -> from(0);
            $table -> string('title');
            $table -> string('type');
            $table -> longText('content');
            $table -> string('status');            
            $table -> json('cover') -> nullable();;
            $table -> date('date');
            $table -> json('appendix') -> nullable();;
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};