<?php

// app/Models/WaliSantri.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaliSantri extends Model
{
    protected $table = 'wali_santri';

    protected $fillable = [
        'nama_ayah', 'nama_ibu', 'santri_id', 'pekerjaan_ibu', 'pekerjaan_ayah', 'alamat', 'no_whatsapp',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
