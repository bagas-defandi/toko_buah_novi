<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function ganti(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'gambar' => 'file|image|max:5000'
        ]);

        if (substr(Auth::user()->gambar, 0, 7) == "images/") {
            Storage::delete('public' . substr("storage/" . Auth::user()->gambar, 7));
            $filePath = public_path('' . Auth::user()->gambar);
            $filePath = str_replace('\\', '/', $filePath);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $oriFileName = preg_replace('/\s+/', '-', $request->gambar->getClientOriginalName());
        $namaFile = 'TBN-' . time() . '-' . $oriFileName;
        $request->gambar->storeAs('public/images', $namaFile);
        $request->gambar->move('images', $namaFile);

        $validateData['gambar'] = 'images/' . $namaFile;
        User::where('id', Auth::user()->id)->update($validateData);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
