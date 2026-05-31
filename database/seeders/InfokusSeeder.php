<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class InfokusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('infokuses')->insert([

            [
                'nama_infokus' => 'Epson X1',
                'kode_infokus' => 'IF001',
                'lokasi' => 'Ruang Peminjaman',
                'status' => 'tersedia'
            ],

            [
                'nama_infokus' => 'Canon Pro',
                'kode_infokus' => 'IF002',
                'lokasi' => 'Ruang Peminjaman',
                'status' => 'dipinjam'
            ],

            [
                'nama_infokus' => 'Sony Projector',
                'kode_infokus' => 'IF003',
                'lokasi' => 'Ruang Peminjaman',
                'status' => 'tersedia'
            ]

        ]);
    }
}