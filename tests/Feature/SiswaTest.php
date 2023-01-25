<?php

namespace Tests\Feature;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiswaTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }

    public function test_admin_can_view_index_siswa()
    {
        $response = $this->actingAs($this->admin)->get('siswas');

        $response->assertSee('List Siswa');
        $response->assertStatus(200);
    }

    public function test_admin_can_create_data_siswa()
    {
        $siswa = Siswa::create([
            'nisn' => '12313123',
            'nama' => 'Henry Salim',
            'alamat' => 'Dadap',
        ]);

        $response = $this->actingAs($this->admin)->get('siswas');

        $response->assertViewHas('siswa', function ($collection) use ($siswa) {
           return $collection->contains($siswa);
        });
        $response->assertSee('List Siswa');
    }
}
