<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('servidores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
             $table->string('cpf', 14)->unique();
            $table->string('email', 100)->unique();
            $table->string('matricula', 100)->unique()->nullable();
            $table->foreignId('unidade_id')->constrained()->cascadeOnDelete();
            $table->foreignId('perfil_id')->constrained()->cascadeOnDelete();
            $table->text('observacoes')->nullable();
            $table->timestamps();

            $table->unique(['unidade_id', 'perfil_id', 'matricula'], 'servidor_unidade_perfil_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servidores');
    }
};