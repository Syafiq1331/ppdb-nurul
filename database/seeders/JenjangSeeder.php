<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'MTS Nurul Adzim',
                'kuota' => 20,
            ],
            [
                'name' => 'MI Nurul Adzim',
                'kuota' => 20,
            ],
        ];

        DB::table('jenjangs')->insert($data);
    }
}
