<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Http\Request;

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
        return view('dashboard.index', [
            'pengaduan' => Pelaporan::count(),
            'kategori' => Kategori::count(),
            'siswa' => Siswa::count()
        ]);
    }
}
