<?php

namespace Database\Seeders;

use App\Models\Santri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SantriSeeder extends Seeder
{
    public function run(): void
    {
        Santri::create([
            'nama_lengkap' => 'Muhammad Calvin',
            'username' => 'Calvin',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2000-01-01',
            'nisn' => '1234567890',
            'asal_sekolah' => 'SMA Negeri 1',
            'alamat' => 'Alamat Sekolah Asal',
            'jenjang_id' => 1,
            'status_bayar' => 'belum bayar',
            'score' => 10,
        ]);
    }
}
