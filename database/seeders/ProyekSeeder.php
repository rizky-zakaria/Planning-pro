<?php

namespace Database\Seeders;

use App\Models\Proyek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proyeks = [
            [
                'instansi_id' => 1,
                'nama_proyek' => 'PEKERJAAN GALERI SOUVENIR',
            ],
        ];

        foreach ($proyeks as $proyek) {
            Proyek::create($proyek);
        }
    }
}
