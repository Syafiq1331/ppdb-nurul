<?php

// database/migrations/timestamp_create_wali_santri_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliSantriTable extends Migration
{
    public function up()
    {
        Schema::create('wali_santri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('siswa')->onDelete('cascade');
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_whatsapp')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wali_santri');
    }
}
