<?php

namespace Database\Seeders;

use App\Models\DokumenPendaftaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumenPendaftaranSeeder extends Seeder
{
    public function run(): void
    {
        // Tambahkan data dokumen pendaftaran
        DokumenPendaftaran::create([
            'santri_id' => 1, // ID Santri yang sesuai
        ]);
    }
}
