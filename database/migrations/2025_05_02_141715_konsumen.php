<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('konsumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->text('alamat')->nullable();
            $table->string('whatsapp')->nullable();

            // Foreign key ke tabel users
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('konsumen');
    }
};
