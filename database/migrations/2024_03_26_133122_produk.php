<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $priority = 1;
    public function up(): void
    {
        if (!Schema::hasTable('produk')) {
            Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk', 255);
            $table->string('tagline', 255);
            $table->text('deskripsi');
            $table->string('foto1',255);
            $table->string('foto2',255);
            $table->string('foto3',255);
            $table->unsignedBigInteger('id_sektor_usaha');
            $table->foreign('id_sektor_usaha')->references('id')->on('sektor_usaha');
            $table->unsignedBigInteger('id_umkm');
            $table->foreign('id_umkm')->references('id')->on('umkm');
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
