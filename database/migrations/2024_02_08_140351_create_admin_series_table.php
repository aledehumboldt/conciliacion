<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void {

        //crear tabla
        Schema::create('admin_series', function (Blueprint $table) {
            $table->id();
            $table->string('prefijo');
            $table->string('apollo1');
            $table->string('apollo2');
            $table->string('plataforma');
            $table->string('area');
            $table->string('inicio');
            $table->string('fin');
            $table->string('codcentral');
            $table->string('tecliente');
            $table->string('central');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_series');
    }
};
