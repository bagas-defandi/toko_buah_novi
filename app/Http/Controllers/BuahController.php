<?php

namespace App\Http\Controllers;

use App\Models\Buah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if ($request->with_variation == 'ya') {
            $validateData = $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'gambar' => 'required|file|image|max:5000',
            ]);
        } else {
            $validateData = $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'harga' => ['required', 'numeric'],
                'stok' => ['required', 'numeric'],
                'jumlah_berat' => ['required', 'numeric', 'max:1000'],
                'berat' => ['required', 'in:kg,gr'],
                'gambar' => 'required|file|image|max:5000'
            ]);
        }

        // Agar nama file berbeda
        $oriFileName = preg_replace('/\s+/', '-', $request->gambar->getClientOriginalName());
        $namaFile = 'TBN-' . time() . '-' . $oriFileName;
        $request->gambar->storeAs('public/images', $namaFile);

        $validateData['gambar'] = 'storage/images/' . $namaFile;
        Buah::create($validateData);

        return to_route('buahs.index')->with('pesan', "Buah \"{$request->nama}\" berhasil ditambah");
    }

    public function edit(Buah $buah)
    {
        return view('buah.edit', compact('buah'));
    }

    public function update(Request $request, Buah $buah)
    {
        $validateData = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'jumlah_berat' => ['required', 'numeric', 'max:1000'],
            'berat' => ['required', 'in:kg,gr'],
            'gambar' => 'file|image|max:5000',
        ]);

        if (isset($request->gambar)) {
            // Gambar di simpan dlm format -> storage/images/namaImg.jpg
            // Untuk menghapus gambar yang disimpan kata "storage" harus dihapus maka menjadi /images/namaImg.jpg
            Storage::delete('public' . substr($buah->gambar, 7));
            $oriFileName = preg_replace('/\s+/', '-', $request->gambar->getClientOriginalName());
            $namaFile = 'TBN-' . time() . '-' . $oriFileName;
            $request->gambar->storeAs('public/images', $namaFile);

            $validateData['gambar'] = 'storage/images/' . $namaFile;
        }

        Buah::where('id', $buah->id)->update($validateData);

        return to_route('buahs.index')->with('pesan', "Buah \"{$request->nama}\" berhasil diubah");
    }

    public function destroy(Buah $buah)
    {
        Storage::delete('public' . substr($buah->gambar, 7));
        $buah->delete();
        return to_route('buahs.index')->with('pesan', "Buah \"{$buah->nama}\" berhasil dihapus");
    }
}
