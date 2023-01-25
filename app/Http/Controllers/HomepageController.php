<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pelaporan;
use App\Models\Siswa;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', [
            'kategori' => Kategori::orderBy('ket_kategori')->get(),
            'siswa' => Siswa::orderBy('nisn')->get(),
            'pencarian' => Pelaporan::query()
                ->with(['siswa', 'kategori'])
                ->filter(request(['nisn', 'kategori', 'lokasi', 'keterangan']))
                ->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->getValidation();

        if (request()->hasFile('foto')) {
            $data['foto'] = request()->file('foto')->store('foto-laporan');
        }

        Pelaporan::create($data);

        return redirect('/#pengaduan')->with('message', 'Laporan Anda Berhasil Disubmit!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Pelaporan $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelaporan $pelaporan)
    {
        //
    }

    /**
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getValidation(): array
    {
        return $this->validate(request(), [
            'siswa_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required|string',
            'keterangan' => 'required|string',
            'foto' => 'nullable|file|image|mimes:jpg,jpeg,png',
        ], [
            'siswa_id.required' => 'The NISN field is required',
            'kategori_id.required' => 'The kategori field is required'
        ]);
    }
}
