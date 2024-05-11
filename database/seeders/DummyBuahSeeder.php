<?php

namespace Database\Seeders;

use App\Models\Buah;
use App\Models\BuahVariation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyBuahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buah::create([
            'nama' => 'Jeruk Santang',
            'gambar' => 'storage/images/jeruk santang.jpg',
            'harga' => 50000,
            'jumlah_berat' => 1,
            'berat' => 'kg',
            'stok' => 7,
        ]);

        Buah::create([
            'nama' => 'Strawberry',
            'gambar' => 'storage/images/buah strowberry.jpg',
        ]);

        Buah::create([
            'nama' => 'Anggur',
            'gambar' => 'storage/images/anggur.jpg',
        ]);

        BuahVariation::create([
            'nama' => 'Anggur Merah',
            'harga' => 70000,
            'jumlah_berat' => 1,
            'berat' => 'kg',
            'stok' => 3,
            'buah_id' => 3,
        ]);

        BuahVariation::create([
            'nama' => 'Anggur Hitam',
            'harga' => 100000,
            'jumlah_berat' => 1,
            'berat' => 'kg',
            'stok' => 3,
            'buah_id' => 3,
        ]);
    }
}
