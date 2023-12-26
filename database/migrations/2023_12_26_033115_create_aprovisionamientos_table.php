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
        Schema::create('aprovisionamientos', function (Blueprint $table) {
            $table->id();
            $table->string('ticket');
            $table->string('celular', 10);
            $table->string('imsi', 15);
            $table->string('fecha');
            $table->string('tcliente');
            $table->string('codacc');
            $table->integer('usuario');
            $table->text('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aprovisionamientos');
    }
};
