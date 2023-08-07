<?php

use App\Models\Book;
use App\Models\Genre;
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
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('genre');
            $table->timestamps();
        });
        Schema::create('book_genre', function (Blueprint $table) {
            $table->foreignIdFor(Book::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Genre::class)->constrained()->cascadeOnDelete();
            $table->primary(['book_id','genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genre');
        Schema::dropIfExists('genres');
    }
};
