<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    @include('landing.includes.head')
<body class="d-flex flex-column h-100">
    @include('landing.includes.header')

    <div class="container">
        @include('landing.includes.navigation')

        <main class="flex-shrink-0 mb-5">
            @yield('content')
        </main>
    </div>


    @include('landing.includes.footer')
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
