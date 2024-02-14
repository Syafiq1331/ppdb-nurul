<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelebihanYayasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Pembentukan Karakter Yang Kuat',
                'desc' => 'Pondok pesantren merupakan lembaga pendidikan yang menitikberatkan pada pembentukan karakter dan akhlak siswanya.',
                'icon' => 'flame'
            ],
            [
                'title' => 'Pendidikan Agama yang Kuat',
                'desc' => 'Pendidikan agama yang diterapkan di pondok pesantren sangat kuat dan intensif. Siswa akan diajarkan tentang aqidah, fiqh, hingga hadits dan sejarah Islam',
                'icon' => 'donate-heart'
            ],
            [
                'title' => 'Lingkungan yang kondusif',
                'desc' => 'Pondok pesantren biasanya berada di daerah pedesaan yang jauh dari keramaian kota (meski ada juga yang berada di perkotaan) dan sudah dikondisikan lingkungannya untuk belajar',
                'icon' => 'street-view'
            ],
            [
                'title' => 'Pembelajaran Yang Intensif',
                'desc' => 'Pondok pesantren biasanya memiliki jadwal yang padat dan intensif. Selain mengikuti kegiatan belajar mengajar, siswa juga akan diajarkan untuk menghafal Al-Qur’an dan memperdalam ilmu agama seperti kitab Hadist dan Bahasa Arab',
                'icon' => 'graduation'
            ]
        ];

        DB::table('kelebihan_yayasan')->insert($data);
    }
}
