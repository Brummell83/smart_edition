<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\author;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name_author');
            $table->longText('biographie')->nullable();
            $table->timestamps();
        });
        Schema::table('books', function (Blueprint $table){
            $table->foreignIdFor(author::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
        Schema::table('books', function (Blueprint $table){
            $table->dropForeignIdFor(author::class);
        });
    }
};
