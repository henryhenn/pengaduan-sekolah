<?php

namespace Tests\Feature;

use App\Models\Pelaporan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PelaporanTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_can_create_laporan()
    {
        $pelaporan = Pelaporan::create([
            'siswa_id' => 1,
           'kategori_id' => 2,
           'lokasi' => 'Kelas',
           'keterangan' => 'Keterangan',
            'foto' => 'foto',
        ]);

        $response = $this->get('/');
        $response->assertSee('Laporan Anda Berhasil Disubmit!');
    }
}
