<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            JenjangSeeder::class,
            SantriSeeder::class,
            WaliSantriSeeder::class,
            UserSeeder::class,
            DokumenPendaftaranSeeder::class,
            ProfileGuruSeeder::class,
            VisiMisiSeeder::class,
            ExamsTableSeeder::class,
            QuestionsTableSeeder::class,
            ResultsTableSeeder::class,
            PemberitahuanSeeder::class,
            KelebihanYayasanSeeder::class,
            ContactSeeder::class,
        ]);
    }
}
