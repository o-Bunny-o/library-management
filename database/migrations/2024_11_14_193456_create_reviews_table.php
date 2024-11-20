<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * run migrations.
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // who wrote the review
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // the reviewed book
            $table->integer('rating'); // rating (e.g., 1-5)
            $table->text('review_text')->nullable(); // review text - opt
            $table->timestamps(); // when
        });
    }

    /**
     * reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
