<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $priority = 4;
    public function up(): void
{
    if (!Schema::hasTable('bentuk_usaha')) {
        Schema::create('bentuk_usaha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',50);
            $table->timestamps();
        });
    }
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bentuk_usaha');
    }
};