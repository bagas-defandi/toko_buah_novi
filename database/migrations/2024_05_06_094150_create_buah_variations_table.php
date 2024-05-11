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
        Schema::create('buah_variations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->integer('berat');
            $table->enum('satuan_berat', ['gr', 'kg']);
            $table->integer('stok');
            $table->foreignId('buah_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buah_variations');
    }
};
