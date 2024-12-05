<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAboutToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('about')->nullable()->after('password');
            // - `text` : Type de la colonne, adapté pour des descriptions longues.
            // - `nullable` : La colonne peut accepter des valeurs nulles.
            // - `after('password')` : Place la colonne après la colonne `password`. Ajuste si nécessaire.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('about');
        });
    }
}
