<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // protected $priority = 0;
    public function up(): void
    {
        if (!Schema::hasTable('umkm')) {
            Schema::create('umkm', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nama',255)->nullable();
                $table->string('nomor_surat_ijin',255)->nullable();
                $table->string('logo',255)->nullable();
                $table->string('alamat',255)->nullable();
                $table->string('desa',255)->nullable();
                $table->string('kecamatan',255)->nullable();
                $table->string('kodepos',10)->nullable();
                $table->string('no_telp_kantor',20)->nullable();
                $table->string('faksimili',255)->nullable();
                $table->string('website',255)->nullable();
                // $table->string('email',255)->nullable();
                $table->string('whatsapp',255)->nullable();
                // $table->string('password',255)->nullable();
                $table->date('tgl_mulai')->nullable();
                $table->string('NPWP',255)->nullable();
                // $table->string('role',255)->nullable();
                // $table->string('status', 255)->default('Nonaktif')->nullable()->change();
                $table->unsignedBigInteger('id_sektor_usaha')->nullable();
                $table->foreign('id_sektor_usaha')->references('id')->on('sektor_usaha');
                $table->unsignedBigInteger('id_skala_usaha')->nullable();
                $table->foreign('id_skala_usaha')->references('id')->on('skala_usaha');
                $table->string('jumlah_karyawan_pria', 10)->nullable();
                $table->string('jumlah_karyawan_wanita', 10)->nullable();
                // $table->string('nama_pemilik', 255)->nullable();
                $table->string('akses_perbankan', 10)->nullable();
                $table->string('modal_awal', 50)->nullable();
                $table->string('omset', 50)->nullable();
                $table->unsignedBigInteger('id_bentuk_usaha')->nullable();
                $table->foreign('id_bentuk_usaha')->references('id')->on('bentuk_usaha');
                $table->unsignedBigInteger('id_user')->nullable();
                $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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