<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('themes', function (Blueprint $table) {
            
            $table -> foreignId('parent_id') -> constrained(
                table: 'themes', 
                indexName: 'id'
            ) 
            -> nullable()
            -> onUpdate('cascade')
            -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('themes', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
};
