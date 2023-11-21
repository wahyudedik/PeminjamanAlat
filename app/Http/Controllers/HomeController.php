<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if (Gate::allows('isAdmin')) {
        //     return view('admin.dashboard'); // Tampilkan halaman dashboard admin
        // } elseif (Gate::allows('isSiswa')) {
        //     return view('siswa.dashboard'); // Tampilkan halaman dashboard siswa
        // } else {
        //     abort(403, 'Unauthorized action.'); // Tampilkan error 403 jika tidak memiliki akses
        // }

        $user = auth()->user(); // Mengambil informasi pengguna yang sedang login

        if ($user) {
            if (Gate::forUser($user)->allows('isAdmin')) {
                return view('admin.dashboard'); // Tampilkan halaman dashboard admin
            } elseif (Gate::forUser($user)->allows('isSiswa')) {
                return view('siswa.dashboard'); // Tampilkan halaman dashboard siswa
            }
        }

        abort(403, 'Unauthorized action.'); // Tampilkan error 403 jika tidak memiliki akses
    }
}
