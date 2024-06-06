@extends('layouts.page')

@section('content')

    <div class="relative flex items-top justify-center min-h-screen dark:bg-gray-900  py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-1 dark:text-white">
                    
                <div class="p-6">
                    <h1 class="dark:text-white text-2xl font-semibold mb-4">{{ $product->title }}</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="md:col-span-1">
                            <img src="{{ asset('images/misc/' . $product->image_url ) }}" alt="{{ $product->title }}" class="w-full h-64 object-cover mb-4">
                            <p class="dark:text-white">{{ $product->description }}</p>
                        </div>
                        <div class="md:col-span-1 dark:text-white">
                            <h2 class="text-xl font-semibold mb-2">Check product:</h2>
                            <a href="{{ route('products.redirect', $product->id) }}" class="text-blue-500 hover:text-blue-600">{{ $product->title }}</a>
                            <!-- You can add a button here for the CTA (Call to Action) -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection