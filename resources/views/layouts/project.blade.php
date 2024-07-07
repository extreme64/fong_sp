@php
    $manifest = json_decode(@file_get_contents(public_path('/build/.vite/manifest.json')), true);
@endphp

@use('Illuminate\Support\Facades\Vite')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <meta description="@yield('description')">
    </meta>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=Kode+Mono:wght@400..700&family=Sometype+Mono:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <!-- Assets -->
    @if (env('APP_ENV') == 'local')
        <link href="/build/{{ $manifest['resources/css/app.css']['file'] }}" rel="stylesheet" />
        <script src="/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
    @else
        <link href="/build/{{ $manifest['resources/css/app.css']['file'] }}" rel="stylesheet" />
        <script src="/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
    @endif

    @auth
        <script>
            const token = `{{ session('login_token') }}`;
            localStorage.setItem('login_token', token);
        </script>
    @endauth

</head>

<body class="antialiased">

    <header>
        @include('partials.nav')
    </header>

    <main class="layout-project">
        <div 
            class="layout-project__background relative flex items-top justify-center min-h-screen bg-neutral-300 dark:bg-gray-900 py-4 sm:pt-0"
            style="background-image: url('{{ asset('images/'.$backgroungImageUrl) }}');"
            >

            <div
                class="content-dev-game relative flex items-top justify-center min-h-screen  dark:bg-gray-900 py-4 sm:pt-0">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

                        @yield('intro')
                        
                        @yield('gallery')
                        
                        @yield('start-cta')
                        
                        @yield('about')

                        @include('partials.other-projects')

                        @include('partials.subscribe')

                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer>
        @include('partials.footer')
    </footer>

    <script src="{{ asset('js/tw-elements.umd.min.js') }}"></script>

</body>

</html>