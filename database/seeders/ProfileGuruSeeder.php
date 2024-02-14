<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Carbon::setLocale('en');
        DB::table('profile_guru')->insert([
            'nama_depan' => "Muhammad",
            'nama_belakang' => "Nabill",
            'tanggal_lahir' => Carbon::createFromFormat('d-F-Y', "12-August-1999")->format('Y-m-d'),
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Matraman, Jakarta Timur',
            'email' => 'nabill@gmail.com',
            'nomor_whatsapp' => '0981727831238',
            'posisi_pekerjaan' => 'Guru IT',
            'foto_profil' => 'images/foto_guru/avatar-1.png',
            'deskripsi' => 'Saya adalah seorang Guru IT terbaik di sekolah ini lho',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
