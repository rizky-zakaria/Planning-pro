<?php

namespace Database\Seeders;

use App\Models\Instansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instansis = [
            [
                'nama_instansi' => 'DINAS PARIWISATA PROVINSI GORONTALO',
                'program_instansi' => 'PROGRAM PENINGKATAN DAYA TARIK DESTINASI WISATA',
                'kegiatan_instansi' => 'PENGELOLAAN DESTINASTI PARIWISATA PROVINSI',
                'tujuan_proyek' => 'DESIGN PENGEMBANGAN PERENCANAAN EDU AGRO WISATA OBYEK WISATA PANTAI MINANGA',
                'lokasi_instansi' => 'PROVINSI GORONTALO',
                'tahun_anggaran' => '2022',
            ],
        ];

        foreach ($instansis as $instansi) {
            Instansi::create($instansi);
        }
    }
}
