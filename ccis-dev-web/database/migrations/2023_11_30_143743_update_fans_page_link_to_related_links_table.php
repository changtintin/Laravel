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
        Schema::table('related_links', function (Blueprint $table) {
            $table -> string('fans_page_link') -> nullable() -> change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('related_links', function (Blueprint $table) {
            $table -> string('fans_page_link') -> change();
        });
    }
};
