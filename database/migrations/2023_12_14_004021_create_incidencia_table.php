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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('ticket')->unique();
            $table->string('inicio');
            $table->string('fin')->nullable();
            $table->text('descripcion');
            $table->string('tipo');
            $table->string('solicitante');
            $table->unsignedBigInteger('responsable');
            $table->foreign('responsable')->references('usuario')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');;
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('incidencia');
    }
};
