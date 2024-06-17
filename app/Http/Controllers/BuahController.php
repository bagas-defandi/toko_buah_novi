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

        $gambar = $request->file('gambar');
        $storage_res = Storage::disk('s3')->putFileAs('image', $gambar, $gambar->hashName(), [
            'ACL' => 'public-read-write',
        ]);
        $url_storage = Storage::disk('s3')->url($storage_res);
        $validateData['gambar'] = $url_storage;

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
            Storage::disk('s3')->delete(parse_url($buah->gambar));

            $gambar = $request->file('gambar');
            $storage_res = Storage::disk('s3')->putFileAs('image', $gambar, $gambar->hashName(), [
                'ACL' => 'public-read-write',
            ]);
            $url_storage = Storage::disk('s3')->url($storage_res);

            $validateData['gambar'] = $url_storage;
        }

        Buah::where('id', $buah->id)->update($validateData);
        return to_route('buahs.index')->with('pesan', "Buah \"{$request->nama}\" berhasil diubah");
    }

    public function destroy(Buah $buah)
    {
        Storage::disk('s3')->delete(parse_url($buah->gambar));
        $buah->delete();
        return to_route('buahs.index')->with('pesan', "Buah \"{$buah->nama}\" berhasil dihapus");
    }
}
