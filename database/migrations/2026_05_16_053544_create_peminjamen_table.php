<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamen', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('infokus_id');

            $table->date('tanggal_pinjam');

            $table->date('tanggal_kembali');

            $table->string('status')
                  ->default('pending');

            $table->timestamps();

            // FOREIGN KEY USER
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            // FOREIGN KEY INFOCUS
            $table->foreign('infokus_id')
                  ->references('id')
                  ->on('infokuses')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};