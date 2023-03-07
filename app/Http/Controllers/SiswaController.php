<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::latest()->paginate(7);

        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store()
    {
        $this->getValidation();

        Siswa::create($this->getDataSiswa());

        return redirect()->route('siswas.index')->with('message', 'Data Siswa Berhasil Ditambahkan!');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Siswa $siswa)
    {
        $this->getValidation();

        $siswa->update($this->getDataSiswa());

        return redirect()->route('siswas.index')->with('message', 'Data Siswa Berhasil Diupdate!');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return back()->with('message', 'Data Siswa Berhasil Dihapus!');
    }

    /**
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getValidation(): void
    {
        $this->validate(\request(), [
            'nisn' => 'required|max:10',
            'nama' => 'required|string',
            'alamat' => 'required|string',
        ]);
    }

    /**
     * @return array
     */
    public function getDataSiswa(): array
    {
        return [
            'nisn' => \request()->string('nisn'),
            'nama' => \request()->string('nama'),
            'alamat' => \request()->string('alamat'),
        ];
    }
}
