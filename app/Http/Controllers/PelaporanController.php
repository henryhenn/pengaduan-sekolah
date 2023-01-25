<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelaporans = Pelaporan::with(['siswa', 'kategori', 'aspirasi'])->latest()->get();

        return view('pelaporan.index', compact('pelaporans'));
    }

    public function show(Pelaporan $pelaporan)
    {
        $pelaporan->load(['siswa', 'kategori']);

        return view('pelaporan.detail', compact('pelaporan'));
    }

    public function destroy(Pelaporan $pelaporan)
    {
        //
    }
}
