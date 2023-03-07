<?php

namespace Tests\Feature;

use App\Models\Pelaporan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PelaporanTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_can_view_laporan_form()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Buat Pengaduan Baru');
    }

    public function test_siswa_can_create_laporan()
    {
        $pelaporans = $this->createPelaporan();

        $response = $this->get('/#pengaduan');
        $response->assertSee('Laporan Anda Berhasil Disubmit!');
    }

    public function test_siswa_can_list_all_pelaporan()
    {
        $pelaporans = Pelaporan::create([
            'siswa_id' => 1,
            'kategori_id' => 2,
            'lokasi' => 'Kelas',
            'keterangan' => 'Keterangan',
            'foto' => 'foto',
        ]);

        $response = $this->get('/');
        dd($response);
        $response->assertViewHas('cari', function ($collection) use ($pelaporans) {
           return $collection->contains($pelaporans);
        });
    }

    /**
     * @return mixed
     */
    public function createPelaporan()
    {
        return Pelaporan::create([
            'siswa_id' => 1,
            'kategori_id' => 2,
            'lokasi' => 'Kelas',
            'keterangan' => 'Keterangan',
            'foto' => 'foto',
        ]);
    }

}
