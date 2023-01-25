@extends('layouts.app')

@section('title')
    List Siswa
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">@yield('title')</span>
                <a href="{{route('siswas.create')}}" class="btn btn-outline-primary">Tambah Siswa Baru</a>
            </div>
        </div>
        <div class="card-body p-3">
            <x-alert/>
            <div class="table-responsive">
                <table class="table table-primary" id="dataTable">
                    <thead>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>NISN</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($siswa as $key=>$siswa)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$siswa->nama}}</td>
                            <td>{{$siswa->nisn}}</td>
                            <td>{{$siswa->alamat}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('siswas.edit', $siswa->id)}}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{route('siswas.show', $siswa->id)}}"
                                       class="btn btn-sm btn-primary mx-3">Pengaduan</a>
                                    <form action="{{route('siswas.destroy', $siswa->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda Yakin?')">Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data terkini</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
