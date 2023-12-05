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
        Schema::create('bypas', function (Blueprint $table) {
            $table->id();
            $table->string('ticket');
            $table->string('min');
            $table->string('imsi');
            $table->integer('usuario');
            $table->string('accion');
            $table->text('tcliente');
            $table->text('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bypas');
    }
};
