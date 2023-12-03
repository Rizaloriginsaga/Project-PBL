<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => '1234567890123456',
                'nama_lengkap' => 'Admin1',
                'tanggal_lahir' => Carbon::create('1999', '01', '01'),
                'password' => Hash::make('12345678'),
                'foto' => 'default.png',
                'role' => 'admin'
            ],
            [
                'username' => '1234567890098765',
                'nama_lengkap' => 'Mahasiswa1',
                'tanggal_lahir' => Carbon::create('2004', '02', '03'),
                'password' => Hash::make('12345678'),
                'foto' => 'default.png',
                'role' => 'mahasiswa'
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
