@if(session('message'))
    <div class="alert alert-success my-3 {{request()->routeIs('homepage') ? '' : 'text-white'}}">{{session('message')}}</div>
@endif
