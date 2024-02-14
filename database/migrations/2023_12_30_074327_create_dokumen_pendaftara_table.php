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
        Schema::create('dokumen_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('fc_akta_kelahiran')->nullable();
            $table->string('fc_kartu_keluarga')->nullable();
            $table->string('fc_ktp_ortu_walisantri')->nullable();
            $table->string('fc_surat_kematian')->nullable();
            $table->bigInteger('santri_id')->unsigned();
            $table->foreign('santri_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->string('fc_sktm')->nullable();
            $table->string('fc_surat_pindah')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_pendaftara');
    }
};
