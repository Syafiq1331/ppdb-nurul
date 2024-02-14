<?php

namespace Database\Seeders;

use App\Models\Pemberitahuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemberitahuanSeeder extends Seeder
{
    public function run()
    {
        // Hapus data yang ada di tabel sebelum menambahkan data baru
        Pemberitahuan::truncate();

        // Tambahkan data pemberitahuan
        Pemberitahuan::create([
            'text' => 'Pemberitahuan pertama',
            'status' => 'publish',
        ]);

        Pemberitahuan::create([
            'text' => 'Pemberitahuan kedua',
            'status' => 'draft',
        ]);

        // Tambahkan lebih banyak data sesuai kebutuhan
    }
}
