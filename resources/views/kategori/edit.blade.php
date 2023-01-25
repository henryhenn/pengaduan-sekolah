@extends('layouts.app')

@section('title')
    Edit Kategori: {{$kategori->ket_kategori}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                @yield('title')
            </div>
        </div>
        <div class="card-body p-3">
            <form action="{{route('kategoris.update', $kategori->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <label for="ket_kategori">NISN</label>
                    <input type="text" name="ket_kategori" value="{{old('ket_kategori', $kategori->ket_kategori)}}"
                           id="ket_kategori" class="form-control @error('ket_kategori')
                            is-invalid @enderror">
                    @error('ket_kategori')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
