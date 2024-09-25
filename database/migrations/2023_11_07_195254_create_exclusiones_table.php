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
        Schema::create('exclusiones', function (Blueprint $table) {
            $table->id();
            $table->string('ticket');
            $table->string('fechae');
            $table->string('fechac');
            $table->integer('usuario');
            $table->string('celular', 10)->unique();
            $table->text('observaciones');
            $table->string('tecnologia');
            $table->string('tcliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('exclusiones');
    }
};
