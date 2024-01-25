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
        Schema::table('actors', function (Blueprint $table) {
            // Aquí no es necesario realizar cambios ya que es un rollback
            // Laravel entenderá que debe quitar la columna 'nueva_columna'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('actors', function (Blueprint $table) {
            $table->dropColumn('nueva_columna');
        });
    }
};
