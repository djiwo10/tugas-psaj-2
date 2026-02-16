<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{

    /*
    =========================
    SHOW SETTINGS PAGE
    =========================
    */

    public function edit(Request $request): View
    {
        return view('dashboard.setelan', [
            'user' => $request->user(),
        ]);
    }


    /*
    =========================
    UPDATE PROFILE
    =========================
    */

    public function updateProfile(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;

        // Upload Avatar
        if ($request->hasFile('avatar')) {

            $file = $request->file('avatar')->store('avatars', 'public');

            $user->avatar = $file;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diupdate');
    }


    /*
    =========================
    UPDATE PASSWORD
    =========================
    */

    public function updatePassword(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        'password' => 'required|min:3|confirmed'
    ]);

    $user = auth()->user();

    // cek password lama
    if(!Hash::check($request->old_password, $user->password)){
        return back()->with('error','Password lama salah');
    }

    // update password
    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('success','Password berhasil diupdate');
}

    /*
    =========================
    DELETE ACCOUNT (optional)
    =========================
    */

    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
