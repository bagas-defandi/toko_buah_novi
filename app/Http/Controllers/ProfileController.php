<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

        if (substr(Auth::user()->gambar, 0, 12) == "https://toko") {
            Storage::disk('s3')->delete(parse_url(Auth::user()->gambar));
        }

        $gambar = $request->file('gambar');
        $storage_res = Storage::disk('s3')->putFileAs('image', $gambar, $gambar->hashName(), [
            'ACL' => 'public-read-write',
        ]);
        $url_storage = Storage::disk('s3')->url($storage_res);
        $validateData['gambar'] = $url_storage;

        User::where('id', Auth::user()->id)->update($validateData);
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
