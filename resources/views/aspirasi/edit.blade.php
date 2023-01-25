@extends('layouts.app')

@section('title')
    Edit Aspirasi
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        @yield('title')
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="{{route('aspirasis.update', $aspirasi->aspirasi->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="pelaporan_id" value="{{$aspirasi->id}}">
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status')
                            is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="menunggu" @selected($aspirasi->aspirasi->status == 'menunggu')>Menunggu</option>
                                <option value="proses" @selected($aspirasi->aspirasi->status == 'proses')>Proses</option>
                                <option value="selesai" @selected($aspirasi->aspirasi->status == 'selesai')>Selesai</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="feedback">Feedback</label>
                            <textarea name="feedback" id="feedback" class="form-control @error('feedback')
                            is-invalid @enderror">{{old('feedback', $aspirasi->aspirasi->feedback)}}</textarea>
                            @error('feedback')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
