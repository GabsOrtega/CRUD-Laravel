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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 255);
            $table->string('E-mail', 255);
            $table->string('Senha', 255);
            $table->string('Data de Nascimento', 10);
            $table->datetime('Data de Criação')->default(DB::raw('CURRENT_TIMESTAMP', '00-00-0000 00:00:00'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_users');
    }
};
