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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Null pour les non connectés
            $table->string('session_id')->nullable()->index();  // Session pour identifier les non connectés
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Référence au livre
            $table->integer('quantity'); // Quantité ajoutée au panier
            $table->decimal('price', 8, 2); // Prix au moment de l'ajout
            $table->timestamps(); // Date d'ajout et de mise à jour
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
