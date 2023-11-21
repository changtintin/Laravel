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
        Schema::rename("research_implements", "practices");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename("practices", "research_implements");
    }
};
