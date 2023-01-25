<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Pelaporan;

class AspirasiController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Aspirasi $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function show(Pelaporan $aspirasi)
    {
        return view('aspirasi.create', compact('aspirasi'));
    }

    public function store()
    {
        $data = $this->getAspirasi();

        Aspirasi::create($data);

        return redirect()->route('pelaporans.show', $data['pelaporan_id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Aspirasi $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelaporan $aspirasi)
    {
        $aspirasi->load(['aspirasi']);

        return view('aspirasi.edit', compact('aspirasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Aspirasi $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function update(Aspirasi $aspirasi)
    {
        $data = $this->getAspirasi();

        $aspirasi->update($data);

        return redirect()
            ->route('pelaporans.show', $aspirasi->pelaporan->id)
            ->with('message', 'Aspirasi Berhasil Diupdate!');
    }

    /**
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getAspirasi(): array
    {
        return $this->validate(request(), [
            'status' => 'required',
            'feedback' => 'required|string',
            'pelaporan_id' => 'required',
        ]);
    }
}
