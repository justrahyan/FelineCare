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
        Schema::create('basis_pengetahuans', function (Blueprint $table) {
            $table->id('id_rule');
            $table->foreignId('id_penyakit')->constrained('penyakits', 'id_penyakit')->onDelete('cascade');
            $table->foreignId('id_gejala')->constrained('gejalas', 'id_gejala')->onDelete('cascade');
            $table->float('mb');
            $table->float('md');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basis_pengetahuans');
    }
};
