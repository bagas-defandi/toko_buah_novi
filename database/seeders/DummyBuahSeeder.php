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
            'gambar' => 'storage/images/TBN-1715405961-jeruk-santang.jpg',
            'harga' => 50000,
            'berat' => 1,
            'satuan_berat' => 'kg',
            'stok' => 7,
        ]);

        Buah::create([
            'nama' => 'Strawberry',
            'gambar' => 'storage/images/TBN-1715405962-buah-strowberry.jpg',
        ]);

        Buah::create([
            'nama' => 'Anggur',
            'gambar' => 'storage/images/TBN-1715405963-anggur.jpg',
        ]);

        BuahVariation::create([
            'nama' => 'Anggur Merah',
            'harga' => 70000,
            'berat' => 1,
            'satuan_berat' => 'kg',
            'stok' => 3,
            'buah_id' => 3,
        ]);

        BuahVariation::create([
            'nama' => 'Anggur Hitam',
            'harga' => 100000,
            'berat' => 1,
            'satuan_berat' => 'kg',
            'stok' => 3,
            'buah_id' => 3,
        ]);
    }
}
