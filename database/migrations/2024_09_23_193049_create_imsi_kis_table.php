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
        Schema::create('imsi_kis', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->bigInteger('imsi')->unsigned();
            $table->text('observaciones');
            $table->bigInteger('ticket')->unsigned();
            $table->timestamps();
          
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imsi_kis');
    }
};
