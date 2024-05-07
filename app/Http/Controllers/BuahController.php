<?php

namespace App\Http\Controllers;

use App\Models\Buah;
use Illuminate\Http\Request;

class BuahController extends Controller
{
    public function index()
    {
        return view('buah.index', ['buahs' => Buah::all()]);
    }

    public function create()
    {
        return view('buah.create');
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'jumlah_berat' => ['required', 'numeric', 'max:1000'],
            'berat' => ['required', 'in:kg,gr'],
            'gambar' => 'required|file|image|max:5000'
        ]);

        $oriFileName = preg_replace('/\s+/', '-', $request->gambar->getClientOriginalName());
        $namaFile = 'TBN-' . time() . $oriFileName;
        $request->gambar->storeAs('public/images', $namaFile);

        Buah::create([
            'nama' => $valid['nama'],
            'harga' => $valid['harga'],
            'stok' => $valid['stok'],
            'jumlah_berat' => $valid['jumlah_berat'],
            'berat' => $valid['berat'],
            'gambar' => 'storage/images/' . $namaFile,
        ]);

        return to_route('buahs.index')->with('pesan', "Buah {$request->nama} berhasil ditambah");
    }
}
