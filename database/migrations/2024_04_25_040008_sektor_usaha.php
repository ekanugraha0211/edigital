<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // protected $priority = 3;
    public function up(): void
    {
        if (!Schema::hasTable('sektor_usaha')) {
            Schema::create('sektor_usaha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',50)->nullable();
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sektor_usaha');
    }
};