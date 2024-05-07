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
            'gambar' => 'storage/images/jeruk santang.jpg',
            'harga' => 50000,
            'jumlah_berat' => 1,
            'berat' => 'kg',
            'stok' => 7,
        ]);
    }
}
