<?php

namespace Database\Seeders;

use App\Models\WaliSantri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaliSantriSeeder extends Seeder
{
    public function run(): void
    {
        WaliSantri::insert([
            [
                'santri_id' => 1,
                'nama_ayah' => 'John Doe Sr.',
                'nama_ibu' => 'Jane Doe',
                'pekerjaan_ibu' => 'PNS',
                'pekerjaan_ayah' => 'Wiraswasta',
                'alamat' => 'Jl. Wali No. 456, Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
                'no_whatsapp' => '086579123132',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
