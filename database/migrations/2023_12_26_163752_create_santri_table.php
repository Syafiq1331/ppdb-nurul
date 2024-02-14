<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTable extends Migration
{
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('username')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->bigInteger('jenjang_id')->unsigned();
            $table->foreign('jenjang_id')->references('id')->on('jenjangs');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('photo')->nullable();
            $table->string('nisn')->unique()->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->enum('status_bayar', ['Belum Bayar', 'Sudah Bayar']);
            $table->text('alamat')->nullable();
            $table->text('score')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
