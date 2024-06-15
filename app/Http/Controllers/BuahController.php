<?php

namespace App\Http\Controllers;

use App\Models\Buah;
use App\Models\BuahVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $validateData = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'berat' => ['required', 'numeric',],
            'satuan_berat' => ['required', 'in:kg,gr'],
            'gambar' => 'required|file|image|max:5000'
        ]);


        // Agar nama file berbeda
        $oriFileName = preg_replace('/\s+/', '-', $request->gambar->getClientOriginalName());
        $namaFile = 'TBN-' . time() . '-' . $oriFileName;
        // $request->gambar->storeAs('public/images', $namaFile);
        $request->gambar->move('images', $namaFile);

        $validateData['gambar'] = 'images/' . $namaFile;
        Buah::create($validateData);

        return to_route('buahs.index')->with('pesan', "Buah \"{$request->nama}\" berhasil ditambah");
    }

    public function show(Buah $buah)
    {
        // tidak membutuhkan show karena tidak ada variasi
        // return view('buah.show', compact('buah'));
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
            'berat' => ['required', 'numeric',],
            'satuan_berat' => ['required', 'in:kg,gr'],
            'gambar' => 'file|image|max:5000'
        ]);

        if (isset($request->gambar)) {
            // Gambar di simpan dlm format -> images/namaImg.jpg
            // Untuk menghapus gambar yang disimpan kata "storage" harus dihapus maka menjadi storage/images/namaImg.jpg
            Storage::delete('public' . substr("storage/$buah->gambar", 7));
            $filePath = public_path('' . $buah->gambar);
            $filePath = str_replace('\\', '/', $filePath);
            if (file_exists($filePath)) {
                File::delete($filePath);
            }
            $oriFileName = preg_replace('/\s+/', '-', $request->gambar->getClientOriginalName());
            $namaFile = 'TBN-' . time() . '-' . $oriFileName;
            // $request->gambar->storeAs('public/images', $namaFile);
            $request->gambar->move('images', $namaFile);

            $validateData['gambar'] = 'images/' . $namaFile;
        }

        Buah::where('id', $buah->id)->update($validateData);

        return to_route('buahs.index')->with('pesan', "Buah \"{$request->nama}\" berhasil diubah");
    }

    public function destroy(Buah $buah)
    {
        Storage::delete('public' . substr("storage/$buah->gambar", 7));
        $filePath = public_path('' . $buah->gambar);
        $filePath = str_replace('\\', '/', $filePath);
        if (file_exists($filePath)) {
            File::delete($filePath);
        }
        $buah->delete();
        return to_route('buahs.index')->with('pesan', "Buah \"{$buah->nama}\" berhasil dihapus");
    }
}
