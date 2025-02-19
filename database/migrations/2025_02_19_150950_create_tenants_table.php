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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug'); // 			
            $table->string('address'); // Dirección de la empresa
            $table->string('postal_code'); // Código postal de la empresa
            $table->string('phone'); // Teléfono de la empresa
            $table->string('email'); // Email de la empresa
            $table->string('cuit')->unique(); // CUIT de la empresa
            $table->foreignId('iva_position_id')->constrained('iva_positions'); // Relación con la tabla de posiciones IVA
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
