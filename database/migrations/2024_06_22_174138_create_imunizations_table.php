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
        Schema::create('immunizations', function (Blueprint $table) {
            $table->id('immunization_id');
            $table->string('nama_vaksin');
            $table->string('usia_tepat_terpenuhi')->nullable();
            $table->string('usia_masih_dibolehkan')->nullable();
            $table->string('usia_pemberian_imunisasi_kejar')->nullable();
            $table->string('usia_tidak_dibolehkan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imunizations');
    }
};