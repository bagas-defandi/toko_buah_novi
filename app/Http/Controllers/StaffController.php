<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;

class StaffController extends Controller
{
    public function index()
    {
        $collModelId = DB::table('model_has_roles')
            ->where('role_id', '=', '2')
            ->select('model_id')
            ->get();
        $arrModelId = $collModelId->pluck('model_id')->toArray();

        $staffs =
            User::whereIn('id', $arrModelId)->get();

        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'no_telp' => ['required', 'string', 'max:13', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
        ])->assignRole('staff');

        return to_route('staffs.index')->with('pesan', "Staff {$request->name} berhasil ditambah");
    }

    public function destroy($idStaff)
    {
        $user = User::find($idStaff);
        $user->delete();
        return to_route('staffs.index')->with('pesan', "Staff {$user->name} berhasil dihapus");
    }
}
