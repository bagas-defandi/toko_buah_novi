<?php

namespace App\Http\Controllers;

use App\Models\Buah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageGuestController extends Controller
{
    public function index()
    {
        return view('index', ['buahs' => Buah::all()]);
    }

    public function buahs()
    {
        return view('buahs', ['buahs' => Buah::all()]);
    }

    public function buah(int $idBuah)
    {
        $buah = DB::table('buahs')->find($idBuah);
        if ($buah) {
            return view('buah', compact('buah'));
        }
        abort(404);
    }
}
