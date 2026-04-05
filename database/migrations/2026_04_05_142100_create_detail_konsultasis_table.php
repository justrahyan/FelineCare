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
        Schema::create('detail_konsultasis', function (Blueprint $table) {
            $table->id('id_detail');
            $table->foreignId('id_konsultasi')->constrained('konsultasis', 'id_konsultasi')->onDelete('cascade');
            $table->foreignId('id_gejala')->constrained('gejalas', 'id_gejala')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_konsultasis');
    }
};
