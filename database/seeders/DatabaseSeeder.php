<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Fanidiya Tasya',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'Admin'
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Karyawan User',
                'email' => 'karyawan@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Karyawan'
            ],
            [
                'name' => 'Tono Kurniawan',
                'email' => 'karyawan1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Karyawan'
            ]
        ]);

        DB::table('sheep')->insert([
            [
                'id' => 'D240001',
                'sheep_name' => 'Domba Putih',
                'sheep_birth' => '2022-03-15',
                'sheep_gender' => 'Betina',
            ],
            [
                'id' => 'D240002',
                'sheep_name' => 'Domba Hitam',
                'sheep_birth' => '2021-08-10',
                'sheep_gender' => 'Jantan',
            ],
            [
                'id' => 'D240003',
                'sheep_name' => 'Domba Cemani',
                'sheep_birth' => '2023-01-25',
                'sheep_gender' => 'Betina',
            ],
            [
                'id' => 'D240004',
                'sheep_name' => 'Domba Garut',
                'sheep_birth' => '2020-11-30',
                'sheep_gender' => 'Jantan',
            ],
            [
                'id' => 'D240005',
                'sheep_name' => 'Domba Super',
                'sheep_birth' => '2022-05-20',
                'sheep_gender' => 'Betina',
            ],
        ]);
    }
}
