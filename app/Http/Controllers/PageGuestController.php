<?php

namespace App\Http\Controllers;

use App\Models\Buah;
use Illuminate\Http\Request;

class PageGuestController extends Controller
{
    public function index()
    {
        return view('index', ['buahs' => Buah::all()]);
    }
}
