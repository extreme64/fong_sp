<!-- resources/views/layouts/project.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>
        <meta description="@yield('description')"></meta>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
       
       
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />


    </head>
    <body class="antialiased">

        <header>
            @include('partials.nav')
        </header>

        <main>
            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
                
                
                <div class="relative flex w-full items-top justify-center min-h-screen  dark:bg-gray-900 py-4 sm:pt-0">
                    <div class="w-full max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                            
                            
                            <section class="flex flex-col md:flex-row max-w-full mb-32">
                               
                                    @include('partials.admin-nav')
                                    
                                    @yield('main')

                                </div>
                            </section>

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
