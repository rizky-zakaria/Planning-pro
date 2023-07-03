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
                'nama' => 'Admin Kantor',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin'
            ],
            [
                'nama' => 'Pak Bos',
                'email' => 'bos@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'bos'
            ],
        ];

        foreach ($users as $user) {
            if (!User::where('nama', $user['nama'])->exists()) {
                # code...
                User::create($user);
            }
        }
    }
}
