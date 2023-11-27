@extends('layouts.page')

@section('content')


<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">


    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-1 dark:text-white">
                <div class="p-6">
                    <h1>[User] Awards</h1>
                    <p>Unlocked so far</p>
                </div>
                <div class="p-6">
                    <p>This is the place to explore interesting development projects and support the main project.
                    If you choose to support any develpment application, you are helping to create a better future.</p>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-1">
                
                <div class="flex justify-center p-6">
                    <h2 class="dark:text-white">Achevment</h2>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2">
                
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($userAwards as $award)
                    <div class="flex flex-col justify-between border rounded-lg p-4">
                        <div class="">
                            <h2 class="text-lg font-semibold mb-2">{{ $award->title }}</h2>
                            <p class="text-gray-600 mb-4">{{ $award->description }}</p>
                            <img src="{{ asset('images/awards/' . $award->image ) }}" alt="{{ $award->title }}" class="w-32 object-cover mb-2">
                        </div>
                        <!-- 
                        <div class="mt-8">
                            <a href="" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded block text-center">Award Details</a> 
                        </div>
                        -->
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
