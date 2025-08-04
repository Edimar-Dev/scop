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
        Schema::create('perfil_unidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unidade_id')->constrained()->onDelete('cascade');
            $table->foreignId('perfil_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('limite_recomendado')->default(0);
            $table->timestamps();
            $table->unique(['unidade_id', 'perfil_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_unidades');
    }
};
