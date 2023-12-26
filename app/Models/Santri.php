<?php

// app/Models/Santri.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{

    protected $table = "santri";

    protected $fillable = [
        'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nisn', 'asal_sekolah', 'alamat',
    ];

    public function waliSantri()
    {
        return $this->hasOne(WaliSantri::class);
    }
}
