<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPendaftaran extends Model
{
    use HasFactory;

    protected $fillable = ['fc_akta_kelahiran', 'fc_kartu_keluarga', 'fc_ktp_ortu_walisantri', 'fc_surat_kematian', 'santri_id', 'fc_sktm', 'fc_surat_pindah'];

    protected $table = 'dokumen_pendaftaran';

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
