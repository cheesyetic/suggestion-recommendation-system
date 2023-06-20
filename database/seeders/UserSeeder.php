<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nip' => '17681244190',
                'password' => '4dm1n5ud0',
                'role' => 'admin',
            ],
            [
                'nip' => '1234567891',
                'password' => 'demo',
                'role' => 'karyawan',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
