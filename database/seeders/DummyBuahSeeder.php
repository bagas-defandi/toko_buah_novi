<?php

namespace Database\Seeders;

use App\Models\Buah;
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
            'harga' => 55000,
            'berat' => 1,
            'satuan_berat' => 'kg',
            'stok' => 5,
        ]);

        Buah::create([
            'nama' => 'Anggur',
            'gambar' => 'storage/images/TBN-1715405963-anggur.jpg',
            'harga' => 40000,
            'berat' => 1,
            'satuan_berat' => 'kg',
            'stok' => 3,
        ]);
    }
}
