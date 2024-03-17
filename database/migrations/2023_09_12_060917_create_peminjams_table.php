<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kasie_id');
            $table->string('noSPT');
            $table->date('tgl_pinjam')->nullable();
            $table->date('tgl_pengembalian')->format();
            $table->date('tgl_dikembalikan')->nullable();
            $table->string('status');
            $table->string('suratImage');
            $table->string('foto_barang')->nullable();
            $table->bigInteger('kode_barang1')->nullable();
            $table->bigInteger('kode_barang2')->nullable();
            $table->bigInteger('kode_barang3')->nullable();
            $table->bigInteger('seriNUP1')->nullable();
            $table->bigInteger('seriNUP2')->nullable();
            $table->bigInteger('seriNUP3')->nullable();
            $table->string('barang1')->nullable();
            $table->integer('stokbarang1')->nullable();
            $table->string('barang2')->nullable();
            $table->integer('stokbarang2')->nullable();
            $table->string('barang3')->nullable();
            $table->integer('stokbarang3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjams');
    }
};