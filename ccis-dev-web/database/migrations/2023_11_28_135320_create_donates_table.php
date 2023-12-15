<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('donates', function (Blueprint $table) {
            $table -> id() -> autoIncrement();
            $table -> string('title');
            $table -> string('img');
            $table -> text('link');
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
    public function down(): void{
        Schema::dropIfExists('donates');
    }
};
