<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // protected $priority = 1;
    public function up(): void
    {
        if (!Schema::hasTable('produk')) {
            Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk', 255)->nullable();
            $table->string('tagline', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto1',255)->nullable();
            $table->string('foto2',255)->nullable();
            $table->string('foto3',255)->nullable();
            $table->unsignedBigInteger('id_sektor_usaha')->nullable();
            $table->foreign('id_sektor_usaha')->references('id')->on('sektor_usaha');
            $table->unsignedBigInteger('id_umkm')->nullable();
            $table->foreign('id_umkm')->references('id')->on('umkm')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
