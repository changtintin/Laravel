<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('books', function (Blueprint $table) {
            $table -> id() -> autoIncrement();
            $table -> string('title');
            $table -> string('author');
            $table -> string('publisher');
            $table -> enum('status',[
                'draft',
                'published'
            ]); 
            $table -> text('plan') -> nullable();                       
            $table -> date('publish_year');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
