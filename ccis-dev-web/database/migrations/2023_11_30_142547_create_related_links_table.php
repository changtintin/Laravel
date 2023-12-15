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
        Schema::create('related_links', function (Blueprint $table) {
            $table -> id() -> autoIncrement();
            $table -> string('title');
            $table -> string('web_link');
            $table -> string('fans_page_link');
            $table -> enum('status',[
                'draft',
                'published'
            ]);            
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('related_links');
    }
};
