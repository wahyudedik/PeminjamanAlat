<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function profile()
    {

        $userId = Auth::id();
        $user = User::find($userId);

        if ($user && $user->hasRole('admin')) {
            $admin = Admin::where('user_id', $userId)->first();
            if ($admin) {
                return view('admin.profile', ['admin' => $admin]);
            } else {
                return redirect()->back()->with('error', 'Data admin tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke profil admin.');
        }
    }
}
