<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pelaporan;
use App\Models\Siswa;
use Illuminate\Contracts\View\View;

class HomepageController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'kategori' => Kategori::orderBy('ket_kategori')->get(),
            'siswa' => Siswa::orderBy('nisn')->get(),
            'pencarian' => Pelaporan::query()
                ->with(['siswa', 'kategori'])
                ->filter(request(['nisn', 'kategori', 'lokasi', 'keterangan', 'kode']))
                ->get(),
        ]);
    }

    public function store()
    {
        $data = $this->getValidation();

        if (request()->hasFile('foto')) {
            $data['foto'] = request()->file('foto')->store('foto-laporan');
        }
        $kode = time() . '-' . request()->get('siswa_id');

        Pelaporan::create(array_merge($data, compact('kode')));

        return redirect('/#pengaduan')->with('message', $kode);
    }

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
