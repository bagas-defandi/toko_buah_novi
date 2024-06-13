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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_produk');
            $table->integer('total_harga');
            $table->enum('metode_bayar', ['cod', 'qris', 'transfer_bank']);
            $table->enum('status_bayar', ['Belum Bayar', 'Sudah Bayar']);
            $table->string('bukti_bayar')->nullable();
            $table->enum('status_pengiriman', ['Diproses', 'Dikirim', 'Diterima']);
            $table->enum('pengiriman', ['gojek', 'maxim', 'cod']);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
