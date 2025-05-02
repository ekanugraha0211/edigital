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
            $table->text('deskripsi')->nullable();
            $table->string('nomor_surat_ijin')->nullable();
            $table->string('logo')->nullable();
            $table->string('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            // $table->string('telepon', 15)->nullable();
            $table->string('kodepos', 10)->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('faksimili')->nullable();
            // $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('NPWP')->nullable();
            $table->string('jumlah_karyawan_pria', 10)->nullable();
            $table->string('jumlah_karyawan_wanita', 10)->nullable();
            $table->string('akses_perbankan')->nullable();
            $table->string('modal_awal')->nullable();
            $table->string('omset')->nullable();
            $table->unsignedBigInteger('sektor_usaha_id')->nullable();
            $table->unsignedBigInteger('skala_usaha_id')->nullable();
            $table->unsignedBigInteger('bentuk_usaha_id')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sektor_usaha_id')->references('id')->on('sektor_usaha')->onDelete('set null');
            $table->foreign('skala_usaha_id')->references('id')->on('skala_usaha')->onDelete('set null');
            $table->foreign('bentuk_usaha_id')->references('id')->on('bentuk_usaha')->onDelete('set null');
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
