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
        Schema::create('iva_positions', function (Blueprint $table) {
            $table->id();
            $table->string('description'); // Descripción de la posición IVA
            $table->string('code_arca'); // Código de la posición IVA
            $table->json('allowed_voucher_types')->nullable(); // Tipos de comprobantes permitidos para esta posición IVA
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iva_positions');
    }
};
