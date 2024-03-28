<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $priority = 2;
    public function up(): void
    {
        if (!Schema::hasTable('skala_usaha')) {
            Schema::create('skala_usaha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',255);
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skala_usaha');
    }
};
