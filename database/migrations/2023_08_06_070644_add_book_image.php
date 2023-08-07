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
        Schema::table('books',function(Blueprint $table){
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->string('image_four')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books',function(Blueprint $table){
            $table->dropIfExists('image_one');
            $table->dropIfExists('image_two');
            $table->dropIfExists('image_three');
            $table->dropIfExists('image_four');
        });
    }
};
