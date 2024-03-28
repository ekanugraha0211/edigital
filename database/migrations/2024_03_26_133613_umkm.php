<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $priority = 0;
    public function up(): void
    {
        if (!Schema::hasTable('umkm')) {
            Schema::create('umkm', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nama',255);
            $table->string('nomor_surat_ijin',255);
            $table->string('logo',255);
            $table->string('alamat',255);
            $table->string('desa',255);
            $table->string('kecamatan',255);
            $table->string('kodepos',10);
            $table->string('no_telp_kantor',20);
            $table->string('faksimili',255);
            $table->string('website',255);
            $table->string('email',255);
            $table->string('whatsapp',255);
            $table->string('password',255);
            $table->date('tgl_mulai');
            $table->string('NPWP',255);
            $table->string('status',255);
            $table->unsignedBigInteger('id_sektor_usaha');
            $table->foreign('id_sektor_usaha')->references('id')->on('sektor_usaha');
            $table->unsignedBigInteger('id_skala_usaha');
            $table->foreign('id_skala_usaha')->references('id')->on('skala_usaha');
            $table->string('jumlah_karyawan_pria', 10);
            $table->string('jumlah_karyawan_wanita', 10);
            $table->string('nama_pemilik', 255);
            $table->string('akses_perbankan', 10);
            $table->string('modal_awal', 50);
            $table->string('omset', 50);
            $table->unsignedBigInteger('id_bentuk_usaha');
            $table->foreign('id_bentuk_usaha')->references('id')->on('bentuk_usaha');
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
