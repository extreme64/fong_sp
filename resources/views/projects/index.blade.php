<!-- resources/views/projects/index.blade.php -->
@extends('layouts.page')

@section('content')
<div class="relative flex items-top justify-center min-h-screen dark:bg-gray-900 py-4 sm:pt-0">


    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-1 dark:text-white">
                <div class="p-6">
                    <h1>Projects</h1>
                    <p>@forwardcreating.com</p>
                </div>
                <div class="p-6">
                    <p>This is the place to explore interesting development projects and support the main project.
                        If you choose to support any develpment application, you are helping to create a better future.
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-1">
                <div class="flex justify-center p-6">
                    <h2 class="dark:text-white">PROJECTS</h2>
                </div>
            </div>

            <!-- Section: Design Block -->
            <section class="mb-32 text-center lg:text-left">
                <h2 class="mb-12 text-center text-3xl font-bold">
                    Projects we are proud of
                </h2>

                <div class="grid gap-x-6 lg:grid-cols-3 lg:gap-x-12">

                    @foreach ($projects as $project)
                        <div
                            class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat" data-te-ripple-init
                                data-te-ripple-color="light">
                                <img src="{{ asset('images/projects/' . $project->media_id) }}"
                                    class="w-full rounded-t-lg" />
                                <a href="#!">
                                    <div
                                        class="absolute top-0 right-0 bottom-0 left-0 h-full w-full bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,0.2)]">
                                    </div>
                                </a>
                                <svg class="absolute left-0 bottom-0 text-white dark:text-neutral-700"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="currentColor"
                                        d="M0,288L48,256C96,224,192,160,288,160C384,160,480,224,576,213.3C672,203,768,117,864,85.3C960,53,1056,75,1152,69.3C1248,64,1344,32,1392,16L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="p-6">
                                <h5 class="mb-4 text-lg font-bold">{{ $project->title }}</h5>

                                <div class="flex items-center">
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        {!! $project->icon !!}
                                    </div>
                                </div>

                                <p class="mb-6">{{ $project->description }}</p>

                                <a href="{{ route('projects.show', ['project_id' => $project->id, 'permalink' => $project->permalink]) }}"
                                    data-twe-ripple-init data-twe-ripple-color="dark"
                                    class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 motion-reduce:transition-none dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400">
                                    Learn
                                    more</a>

                            </div>
                        </div>
                    @endforeach

                </div>
            </section>
            <!-- Section: Design Block END -->

        </div>
        @endsection