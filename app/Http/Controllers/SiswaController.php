<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{

    public function profile() {

        $userId = Auth::id();
        $user = User::find($userId);

        if ($user && $user->hasRole('siswa')) {
            $siswa = Siswa::where('user_id', $userId)->first();
            if ($siswa) {
                return view('siswa.profile', ['siswa' => $siswa]);
            } else {
                return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke profil siswa.');
        }

    }
}
