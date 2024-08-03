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
        Schema::create('immunization_records', function (Blueprint $table) {
            $table->id('record_id');
            $table->foreignId('patient_id')->constrained('patients', 'patient_id')->onDelete('cascade');
            $table->foreignId('immunization_id')->constrained('immunizations', 'immunization_id')->onDelete('cascade');
            $table->string('usia_saat_pemberian');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->float('lingkar_kepala');
            $table->foreignId('petugas_id')->constrained('users', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imunization_records');
    }
};