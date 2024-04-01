<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $priority = 5;
    public function up(): void
{
    if (!Schema::hasTable('beranda')) {
        Schema::create('beranda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto', 255)->nullable();
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beranda');
    }
};
