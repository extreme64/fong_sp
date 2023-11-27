@extends('layouts.project')

@section('title', 'Path Designer')

@section('description', 'Path Assistant is a cutting-edge mobile application designed for trail builders, engineers, and outdoor enthusiasts. This powerful tool enables users to design, analyze, and optimize paths and trails on maps')

@section('content')
<div class="relative flex items-top justify-center min-h-screen  dark:bg-gray-900 py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <section class="mb-32">

                <div
                    class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700"> 
                    <div class="flex flex-wrap items-center">
                        <div class="hidden shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                        <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/088.jpg" alt="Trendy Pants and Shoes"
                            class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
                        </div>
                        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                            <div class="px-6 py-12 md:px-12 text-sm">
                                <h1 class="mb-4 text-2xl font-bold">
                                Path Designer
                                </h1>
                                <p class="mb-6 flex items-center font-bold uppercase text-danger dark:text-danger-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="mr-2 h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                                </svg>
                                In alpha
                                </p>
                                <h2>Privacy and Security</h2>

                                <p>Path Assistant prioritizes data privacy and ensures that user information remains secure. Personal trail data, such as GPS recordings, remains confidential unless explicitly shared by the user.</p>

                                <h2>Trail Builders' Ultimate Tool:</h2>

                                <p>With its comprehensive mapping, height profile analysis, and collaborative features, Path Assistant has become the ultimate companion for trail builders, engineers, and outdoor enthusiasts. Whether planning new trails or improving existing ones, Path Assistant empowers users to create memorable and enjoyable experiences for all trail enthusiasts.</p>
                            
                                <h3>Key Features:</h3>

                                <ul>
                                    <li>Path Design and Trail Mapping: Path Assistant empowers users to design trails directly on interactive maps. Utilizing a user-friendly interface, users can draw, modify, and customize the paths, tailoring them to fit specific terrains and landscapes.</li>

                                    <li>Height Profile Analysis: The application offers a comprehensive height profile analysis, allowing users to visualize the elevation changes along the designed trails. This essential feature helps trail builders assess the difficulty levels and plan accordingly.</li>

                                    <li>Points of Interest (POI) Marking: Users can mark points of interest along the trails, such as scenic spots, rest areas, or important landmarks. The POI feature adds valuable information to the trail's design, enriching the experience for trail users.</li>

                                    <li>Alternative Trail Comparison: Path Assistant enables users to create and compare multiple trail alternatives side by side. This function facilitates decision-making by evaluating different designs based on elevation, distance, and other factors.</li>

                                    <li>Real-Life Experience Integration: The application allows users to share their trail-building experiences, feedback, and improvements with other trail enthusiasts. Trail builders, engineers, and outdoor enthusiasts can collaborate, providing valuable suggestions to enhance trail designs.</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>
@endsection