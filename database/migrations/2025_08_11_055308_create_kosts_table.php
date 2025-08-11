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
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kota_id')->constrained()->onDelete('cascade');
            $table->string('nama_kost');
            $table->string('gambar_kost1')->nullable();
            $table->string('gambar_kost2')->nullable();
            $table->string('gambar_kost3')->nullable();
            $table->string('slug')->unique();
            $table->text('alamat')->nullable();
            $table->text('map')->nullable();
            $table->integer('harga')->default(0);
            $table->integer('jumlah_kamar')->default(0);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosts');
    }
};
