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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // name of the category
            $table->text('description')->nullable(); // optional description
            $table->timestamps(); // when
        });
    }

    /**
     * reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
