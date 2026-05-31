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
        Schema::create('infokuses', function (Blueprint $table) {

            $table->id();

            $table->string('nama_infokus');

            $table->string('kode_infokus');

            $table->string('lokasi');

            $table->string('status')
                  ->default('tersedia');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infokuses');
    }
};