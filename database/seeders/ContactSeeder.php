<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contacts')->insert([
            'alamat' => 'Jl. Nusa Indah, Suliliran Baru, Paser, Kalimantan Timur',
            'no_whatsapp' => '0822-5080-3144',
            'email' => 'psb@nuruladzim.com',
            'jam_operasi' => 'Senin - Jumat 08.00 - 16.00',
            'alamat_gmaps' => 'Jl. Tirtayasa Raya No.6, Melawai, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12160',
        ]);
    }
}
