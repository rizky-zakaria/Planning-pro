<?php

namespace Database\Seeders;

use App\Models\Uraian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UraianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uraians = [
            [
                'proyek_id' => 1,
                'nama_uraian' => 'PEKERJAAN PERSIAPAN',
            ],
            [
                'proyek_id' => 1,
                'nama_uraian' => 'PEKERJAAN PONDASI JALUR',
            ],
            [
                'proyek_id' => 1,
                'nama_uraian' => 'PEKERJAAN BETON BERTULANG',
            ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN DINDING',
            // ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN RANGKA ATAP',
            // ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN ATAP',
            // ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN KANOPI',
            // ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN LANTAI',
            // ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN PLAFOND',
            // ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN PINTU DAN JENDELA',
            // ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN TAMAN',
            // ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN MEP',
            // ],
            // [
            //     'proyek_id' => 1,
            //     'nama_uraian' => 'PEKERJAAN AKHIR',
            // ],
        ];

        foreach ($uraians as $uraian) {
            Uraian::create($uraian);
        }
    }
}
