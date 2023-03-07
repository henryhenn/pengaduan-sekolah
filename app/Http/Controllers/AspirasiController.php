<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Pelaporan;

class AspirasiController extends Controller
{
    public function show(Pelaporan $aspirasi)
    {
        $aspirasi->load('aspirasi');
        
        return view('aspirasi.create', compact('aspirasi'));
    }

    public function store()
    {
        $data = $this->getAspirasi();

        Aspirasi::create($data);

        return redirect()->route('pelaporans.show', $data['pelaporan_id']);
    }

    public function getAspirasi(): array
    {
        return $this->validate(request(), [
            'status' => 'required',
            'feedback' => 'required|string',
            'pelaporan_id' => 'required',
        ]);
    }
}
