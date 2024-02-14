<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileGuru extends Model
{
    use HasFactory;

    protected $table = 'profile_guru';
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'email',
        'nomor_whatsapp',
        'posisi_pekerjaan',
        'foto_profil',
        'deskripsi',
        'visi',
        'misi',
    ];
}
