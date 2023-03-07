@if(session('message'))
    <div class="alert alert-success my-3 {{request()->routeIs('homepage') ? '' : 'text-white'}}">Simpan Kode Ini:
        <b>{{session('message')}}</b> untuk keperluan Anda!
    </div>
@endif
