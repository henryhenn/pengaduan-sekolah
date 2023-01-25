<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::latest()->get();

        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->getValidation();

        Kategori::create($this->getKategori());

        return redirect()->route('kategoris.index')->with('message', 'Kategori Berhasil Ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Kategori $kategori)
    {
        $this->getValidation();

        $kategori->update($this->getKategori());

        return redirect()->route('kategoris.index')->with('message', 'Katgori Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return back()->with('message', 'Kategori Berhasil Dihapus!');
    }

    /**
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getValidation(): void
    {
        $this->validate(request(),
            ['ket_kategori' => 'required'],
            ['ket_kategori.required' => 'The kategori field is required']);
    }

    /**
     * @return array
     */
    public function getKategori(): array
    {
        return [
            'ket_kategori' => request()->string('ket_kategori')
        ];
    }
}
