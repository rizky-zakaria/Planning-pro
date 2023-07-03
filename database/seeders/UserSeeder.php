<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'nama' => 'Admin Kantor',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('123'),
        //     'role' => 'admin'
        // ]);
        $users = [
            [
                'nama_depan' => 'Aslan',
                'nama_belakang' => 'Onu',
                'nomor_telepon' => '+62 895-4121-57788',
                'alamat' => 'Limboto Kabupaten Gorontalo',
                'nama_lengkap' => 'Aslan Onu',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin'
            ],
            [
                'nama_depan' => 'Nikma Sari',
                'nama_belakang' => 'Pakaya',
                'nomor_telepon' => '+62 813-5528-0700',
                'alamat' => 'Jalan Prangkonero Kota Gorontalo',
                'nama_lengkap' => 'Nikma Sari Pakaya',
                'email' => 'bos@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'bos'
            ],
        ];

        foreach ($users as $user) {
            if (!User::where('email', $user['email'])->exists()) {
                User::create($user);
            }
        }
    }
}
