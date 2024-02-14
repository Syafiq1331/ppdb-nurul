<?php

// app/Models/Santri.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{

    protected $table = "siswa";

    protected $fillable = [
        'nama_lengkap', 'jenjang_id', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nisn', 'asal_sekolah', 'alamat', 'bukti_pembayaran', 'score', 'status_bayar'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function waliSantri()
    {
        return $this->hasOne(WaliSantri::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function dokumenPendaftaran()
    {
        return $this->hasOne(DokumenPendaftaran::class);
    }
}
