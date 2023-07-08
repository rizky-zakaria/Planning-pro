<?php

namespace Database\Seeders;

use App\Models\Rab;
use App\Models\Uraian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggarans = [
            [
                'uraian_id' => 1,
                'nama_item' => 'Pekerjaan Papan Nama Proyek',
                'satuan' => 'LS',
                'volume' => 1.00,
                'harga_satuan' => 550000.00,
                'harga_total_per_item' => 1.00 * 550000.00,
            ],
            [
                'uraian_id' => 1,
                'nama_item' => 'Pekerjaan Air Kerja & Listrik',
                'satuan' => 'LS',
                'volume' => 1.00,
                'harga_satuan' => 1000000.00,
                'harga_total_per_item' => 1.00 * 1000000.00,
            ],
            [
                'uraian_id' => 1,
                'nama_item' => 'Pekerjaan Pembersihan Lokasi',
                'satuan' => 'M2',
                'volume' => 127.27,
                'harga_satuan' => 23805.00,
                'harga_total_per_item' => 127.27 * 23805.00,
            ],
            [
                'uraian_id' => 1,
                'nama_item' => 'Kesehatan dan Keselamatan Kerja',
                'satuan' => 'LS',
                'volume' => 1.00,
                'harga_satuan' => 2131000.00,
                'harga_total_per_item' => 1.00 * 2131000.00,
            ],
            [
                'uraian_id' => 2,
                'nama_item' => 'Pekerjaan Galian Tanah',
                'satuan' => 'M3',
                'volume' => 34.98,
                'harga_satuan' => 98612.50,
                'harga_total_per_item' => 34.98 * 98612.50,
            ],
            [
                'uraian_id' => 2,
                'nama_item' => 'Pekerjaan Urugan Pasir Alas',
                'satuan' => 'M3',
                'volume' => 2.19,
                'harga_satuan' => 245755.00,
                'harga_total_per_item' => 2.19 * 245755.00,
            ],
            [
                'uraian_id' => 2,
                'nama_item' => 'Pekerjaan Batu Kosong',
                'satuan' => 'M3',
                'volume' => 6.56,
                'harga_satuan' => 734490.90,
                'harga_total_per_item' => 6.56 * 734490.90,
            ],
            [
                'uraian_id' => 2,
                'nama_item' => 'Pekerjaan Pondasi Batu Belah Sp. 1:4',
                'satuan' => 'M3',
                'volume' => 22.53,
                'harga_satuan' => 1130134.50,
                'harga_total_per_item' => 22.53 * 1130134.50,
            ],

            // PEKERJAAN SLOOF 15 x 20 cm
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Bekisting',
                'satuan' => 'M2',
                'volume' => 38.18,
                'harga_satuan' => 318610.38,
                'harga_total_per_item' => 38.18 * 318610.38,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Tulangan Utama Besi Dia, 12',
                'satuan' => 'Kg',
                'volume' => 197.40,
                'harga_satuan' => 17984.96,
                'harga_total_per_item' => 197.40 * 17984.96,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Tulangan Sengkang Besi Dia, 8',
                'satuan' => 'Kg',
                'volume' => 86.78,
                'harga_satuan' => 9889.60,
                'harga_total_per_item' => 86.78 * 9889.60,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Cor Beton K-200',
                'satuan' => 'M3',
                'volume' => 1.64,
                'harga_satuan' => 1073809.52,
                'harga_total_per_item' => 1.64 * 1073809.52,
            ],

            // PEKERJAAN KOLOM UTAMA UK 30 x 30 cm
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Bekisting',
                'satuan' => 'M2',
                'volume' => 7.92,
                'harga_satuan' => 565851.75,
                'harga_total_per_item' => 7.92 * 565851.75,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Tulangan Utama Besi Dia, 12',
                'satuan' => 'Kg',
                'volume' => 29.98,
                'harga_satuan' => 17984.98,
                'harga_total_per_item' => 29.98 * 17984.98,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Tulangan Sengkang Besi Dia, 8',
                'satuan' => 'Kg',
                'volume' => 19.29,
                'harga_satuan' => 9889.60,
                'harga_total_per_item' => 19.29 * 9889.60,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Cor Beton K-200',
                'satuan' => 'M3',
                'volume' => 0.59,
                'harga_satuan' => 1073809.52,
                'harga_total_per_item' => 0.59 * 1073809.52,
            ],

            // PEKERJAAN KOLOM PRAKSTIS UK 12 x 12 cm
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Bekisting',
                'satuan' => 'M2',
                'volume' => 28.51,
                'harga_satuan' => 565851.75,
                'harga_total_per_item' => 28.51 * 565851.75,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Tulangan Utama Besi Dia, 12',
                'satuan' => 'Kg',
                'volume' => 269.78,
                'harga_satuan' => 17984.98,
                'harga_total_per_item' => 269.78 * 17984.98,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Tulangan Sengkang Besi Dia, 8',
                'satuan' => 'Kg',
                'volume' => 173.61,
                'harga_satuan' => 9889.60,
                'harga_total_per_item' => 173.61 * 9889.60,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Cor Beton K-200',
                'satuan' => 'M3',
                'volume' => 0.86,
                'harga_satuan' => 1073809.52,
                'harga_total_per_item' => 0.86 * 1073809.52,
            ],

            // PEKERJAAN RING BALOK UK 15 x 20 cm (Elv +3.50)
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Bekisting',
                'satuan' => 'M2',
                'volume' => 39.87,
                'harga_satuan' => 565851.75,
                'harga_total_per_item' => 39.87 * 565851.75,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Tulangan Utama Besi Dia, 12',
                'satuan' => 'Kg',
                'volume' => 206.02,
                'harga_satuan' => 17984.98,
                'harga_total_per_item' => 206.02 * 17984.98,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Tulangan Sengkang Besi Dia, 8',
                'satuan' => 'Kg',
                'volume' => 90.59,
                'harga_satuan' => 9889.60,
                'harga_total_per_item' => 90.59 * 9889.60,
            ],
            [
                'uraian_id' => 3,
                'nama_item' => 'Pekerjaan Cor Beton K-200',
                'satuan' => 'M3',
                'volume' => 1.71,
                'harga_satuan' => 1073809.52,
                'harga_total_per_item' => 1.71 * 1073809.52,
            ],
        ];

        foreach ($anggarans as $anggaran) {
            Rab::create($anggaran);
            $uraian = Uraian::where('id', $anggaran['uraian_id'])->first();
            $uraian->update([
                'total_biaya' => $uraian->total_biaya + $anggaran['harga_total_per_item'],
            ]);
        }
    }
}
