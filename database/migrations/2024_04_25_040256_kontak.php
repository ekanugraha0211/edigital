<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // protected $priority = 7;
    public function up(): void
    {
        if (!Schema::hasTable('kontak')) {
            Schema::create('kontak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',255)->nullable();
            $table->text('subjek')->nullable();
            $table->string('email', 255)->nullable();
            $table->text('pesan')->nullable();
            $table->timestamps();
        });
    }
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak');
    }
};