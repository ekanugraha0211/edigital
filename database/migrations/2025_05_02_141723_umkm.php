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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');

            $table->string('nama_umkm');
            $table->string('akses_perbankan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('desa')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('faksimili')->nullable();
            $table->integer('jumlah_karyawan_pria')->default(0);
            $table->integer('jumlah_karyawan_wanita')->default(0);
            $table->string('kodepos', 10)->nullable();
            $table->string('logo')->nullable();
            $table->string('no_surat_ijin')->nullable();
            $table->string('NPWP')->nullable();
            $table->string('website')->nullable();

            $table->unsignedBigInteger('sektor_usaha_id')->nullable();
            $table->unsignedBigInteger('bentuk_usaha_id')->nullable();
            $table->unsignedBigInteger('skala_usaha_id')->nullable();

            // Foreign keys
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sektor_usaha_id')->references('id')->on('sektor_usaha')->nullOnDelete();
            $table->foreign('bentuk_usaha_id')->references('id')->on('bentuk_usaha')->nullOnDelete();
            $table->foreign('skala_usaha_id')->references('id')->on('skala_usaha')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
