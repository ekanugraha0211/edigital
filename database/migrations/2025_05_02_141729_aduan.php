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
        if (!Schema::hasTable('aduan')) {
            Schema::create('aduan', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('users_id');
                $table->string('Judul');
                $table->text('pesan');
                // $table->date('tanggal');
    
                // Foreign key ke tabel users
                $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            });
    }
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};