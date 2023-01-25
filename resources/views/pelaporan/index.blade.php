@extends('layouts.app')

@section('title')
    List Pelaporan
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="fw-bold">@yield('title')</span>
        </div>
        <div class="card-body p-3">
            <x-alert/>
            <div class="table-responsive">
                <table class="table table-primary" id="dataTable">
                    <thead>
                    <th>#</th>
                    <th>Pelapor</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($pelaporans as $key=>$pelaporan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$pelaporan->siswa->nama}}</td>
                            <td>{{$pelaporan->kategori->ket_kategori}}</td>
                            <td>{{$pelaporan->aspirasi->status ?? 'Belum ada status terkini'}}</td>
                            <td>
                                <img src="{{asset('storage/' . $pelaporan->foto)}}" alt="Foto Laporan"
                                     class="img-fluid">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('pelaporans.show', $pelaporan->id)}}"
                                       class="btn btn-sm btn-primary me-3">Detail</a>
                                    <form action="{{route('pelaporans.destroy', $pelaporan->id)}}" method="post">
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
