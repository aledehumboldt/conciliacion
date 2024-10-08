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
        Schema::create('bypas_whitelists', function (Blueprint $table) {
            $table->id();
            $table->string('ticket');
            $table->string('fecha');
            $table->integer('usuario');
            $table->string('min')->unique();
            $table->text('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('bypas_whitelists');
    }
};
