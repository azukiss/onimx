@extends('templates.global.page')

@section('main')
    <div class="page-body">
        @include('templates.user.aside')
        <div class="main-side">
            @hasSection('user-settings')
                @yield('user-settings')
            @endif
        </div>
    </div>
@endsection
