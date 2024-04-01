<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $priority = 6;
    public function up(): void
    {
        if (!Schema::hasTable('bantuan')) {
            Schema::create('bantuan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pertanyaan', 255)->nullable(); // Menggunakan tipe string dengan panjang maksimum 255 karakter
            $table->text('jawaban')->nullable();
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuan');
    }
};
