<?php

namespace App\Http\Controllers;

use App\Models\Buah;
use App\Models\BuahVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuahController extends Controller
{
    public function index()
    {
        return view('buah.index', ['buahs' => Buah::with('buah_variations')->get()]);
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
                'berat' => ['required', 'numeric',],
                'satuan_berat' => ['required', 'in:kg,gr'],
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

    public function show(Buah $buah)
    {
        return view('buah.show', compact('buah'));
    }

    public function edit(Buah $buah)
    {
        return view('buah.edit', compact('buah'));
    }

    public function update(Request $request, Buah $buah)
    {
        if ($request->with_variation == 'ya') {
            $validateData = $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'gambar' => 'file|image|max:5000',
            ]);
        } else {
            $validateData = $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'harga' => ['required', 'numeric'],
                'stok' => ['required', 'numeric'],
                'berat' => ['required', 'numeric',],
                'satuan_berat' => ['required', 'in:kg,gr'],
                'gambar' => 'file|image|max:5000'
            ]);
        }

        if ($request->with_variation == 'tidak') {
            // Hapus buah yang memiliki variasi
            if (count($buah->buah_variations->toArray()) > 0) {
                $buahVariations = BuahVariation::where('buah_id', $buah->id);
                $buahVariations->delete();
            }
        } else {
            // Hapus data utk buah yang berubah menjadi memiliki variasi
            $validateData['harga'] = null;
            $validateData['berat'] = null;
            $validateData['satuan_berat'] = null;
            $validateData['stok'] = null;
        }

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
