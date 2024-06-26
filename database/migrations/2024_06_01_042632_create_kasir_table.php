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
        Schema::create('kasir', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaksi_id');
            $table->integer('total');
            $table->integer('bayar');
            $table->integer('kembali');
            $table->timestamp('create_at')->useCurrent();

            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasir');
    }
};
