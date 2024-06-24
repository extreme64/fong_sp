@extends('layouts.project')

@section('title', $project->title)

@section('description', $project->description)

@section('intro')
<section class="p-6 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
    <div class="lg:container grid gap-6 mx-auto text-center lg:grid-cols-2 xl:grid-cols-5">
        <div class="w-full px-6 py-16 rounded-md sm:px-12 md:px-16 xl:col-span-2 bg-gray-50 dark:bg-gray-900">
            <span class="block mb-2 text-blue-600 dark:text-blue-400">
                <p class="mb-6 flex justify-center items-center font-bold uppercase text-danger dark:text-danger-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                    </svg>
                    {{ $project_production_stage }}
                </p>
            </span>

            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-gray-50">
                {{ $project->title }}
            </h1>

            <p class="my-8">
                {!! $project->description !!}</p>

            <form novalidate="" action="" class="self-stretch space-y-3">
                <div>
                    <label for="name" class="text-sm sr-only">Your name</label>
                    <input id="name" type="text" placeholder="Your name"
                        class="w-full rounded-md focus:ring focus:ring-blue-600 focus:dark:ring-blue-400 border-gray-300 dark:border-gray-700">
                </div>
                <div>
                    <label for="lastname" class="text-sm sr-only">Email address</label>
                    <input id="lastname" type="text" placeholder="Email address"
                        class="w-full rounded-md focus:ring focus:ring-blue-600 focus:dark:ring-blue-400 border-gray-300 dark:border-gray-700">
                </div>
                <button type="button"
                    class="w-full py-2 font-semibold rounded bg-blue-600 dark:bg-blue-400 text-gray-50 dark:text-gray-900">Join
                    the waitlist</button>
            </form>
        </div>

        <!-- <img src="{{ asset('images/plc-hld.png') }}" alt="" class="object-cover w-full rounded-md xl:col-span-3 bg-gray-500 dark:bg-gray-500"> -->
        <div class="embed-responsive embed-responsive-1by1 relative w-full rounded-md xl:col-span-3 overflow-hidden"
            style="padding-top: 100%">
            <iframe class="embed-responsive-item absolute bottom-0 left-0 right-0 top-0 h-full w-full"
                src="https://www.youtube.com/embed/vlDzYIIOYmM?enablejsapi=1&amp;origin=https%3A%2F%2Fmdbootstrap.com"
                allowfullscreen="" data-gtm-yt-inspected-2340190_699="true" id="240632615"></iframe>
        </div>


    </div>
</section>
@endsection


@section('start-cta')
<aside class="py-12 bg-gray-100 text-gray-900">
    <div class="container mx-auto flex flex-col justify-around p-4 text-center md:p-10 lg:flex-row">
        <div class="flex flex-col justify-center lg:text-left">
            <p class="mb-1 text-sm font-medium tracking-widest uppercase text-blue-600">
                Start Now</p>
            <h1 class="py-2 text-3xl font-medium leading-tight title-font">Hot to -> <span
                    class="font-semibold text-blue-600">{{ $project->title }}</span></h1>
        </div>
        <div
            class="flex flex-col items-center justify-center flex-shrink-0 mt-6 space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 lg:ml-4 lg:mt-0 lg:justify-end">
            <button class="inline-flex items-center px-6 py-3 rounded-lg bg-blue-600 text-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-7 h-7 text-gray-50">
                    <path
                        d="M 5.4160156 2.328125 L 12.935547 10.158203 C 13.132547 10.363203 13.45925 10.363203 13.65625 10.158203 L 15.179688 8.5742188 C 15.405688 8.3392188 15.354312 7.956875 15.070312 7.796875 C 11.137313 5.571875 6.2620156 2.811125 5.4160156 2.328125 z M 3.140625 2.8476562 C 3.055625 3.0456562 3 3.2629063 3 3.5039062 L 3 20.591797 C 3 20.788797 3.044375 20.970625 3.109375 21.140625 L 11.576172 12.324219 C 11.762172 12.131219 11.762172 11.826813 11.576172 11.632812 L 3.140625 2.8476562 z M 17.443359 9.2578125 C 17.335484 9.2729375 17.233297 9.32375 17.154297 9.40625 L 15.015625 11.632812 C 14.829625 11.825812 14.829625 12.130219 15.015625 12.324219 L 17.134766 14.529297 C 17.292766 14.694297 17.546141 14.729188 17.744141 14.617188 C 19.227141 13.777188 20.226563 13.212891 20.226562 13.212891 C 20.725562 12.909891 21.007 12.443547 21 11.935547 C 20.992 11.439547 20.702609 10.981938 20.224609 10.710938 C 20.163609 10.676937 19.187672 10.124359 17.763672 9.3183594 C 17.664172 9.2623594 17.551234 9.2426875 17.443359 9.2578125 z M 13.296875 13.644531 C 13.165875 13.644531 13.034047 13.696328 12.935547 13.798828 L 5.4746094 21.566406 C 6.7566094 20.837406 11.328781 18.249578 15.050781 16.142578 C 15.334781 15.981578 15.386156 15.599281 15.160156 15.363281 L 13.65625 13.798828 C 13.55775 13.696328 13.427875 13.644531 13.296875 13.644531 z">
                    </path>
                </svg>
                <span class="flex flex-col items-start ml-4 leading-none">
                    <span class="mb-1 text-xs">GET IT ON</span>
                    <span class="font-semibold title-font">Web Store</span>
                </span>
            </button>
            <button class="inline-flex items-center px-5 py-3 rounded-lg bg-blue-600 text-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" class="fill-current w-7 h-7 text-gray-50">
                    <path
                        d="M 44.527344 34.75 C 43.449219 37.144531 42.929688 38.214844 41.542969 40.328125 C 39.601563 43.28125 36.863281 46.96875 33.480469 46.992188 C 30.46875 47.019531 29.691406 45.027344 25.601563 45.0625 C 21.515625 45.082031 20.664063 47.03125 17.648438 47 C 14.261719 46.96875 11.671875 43.648438 9.730469 40.699219 C 4.300781 32.429688 3.726563 22.734375 7.082031 17.578125 C 9.457031 13.921875 13.210938 11.773438 16.738281 11.773438 C 20.332031 11.773438 22.589844 13.746094 25.558594 13.746094 C 28.441406 13.746094 30.195313 11.769531 34.351563 11.769531 C 37.492188 11.769531 40.8125 13.480469 43.1875 16.433594 C 35.421875 20.691406 36.683594 31.78125 44.527344 34.75 Z M 31.195313 8.46875 C 32.707031 6.527344 33.855469 3.789063 33.4375 1 C 30.972656 1.167969 28.089844 2.742188 26.40625 4.78125 C 24.878906 6.640625 23.613281 9.398438 24.105469 12.066406 C 26.796875 12.152344 29.582031 10.546875 31.195313 8.46875 Z">
                    </path>
                </svg>
                <span class="flex flex-col items-start ml-4 leading-none">
                    <span class="mb-1 text-xs">OPEN</span>
                    <span class="font-semibold title-font">Free Account</span>
                </span>
            </button>
        </div>
    </div>
</aside>
@endsection


@section('gallery')
<div id="carouselExampleCaptions" class="relative" data-twe-carousel-init data-twe-carousel-slide>
    <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
        data-twe-carousel-indicators>
        <button type="button" data-twe-target="#carouselExampleCaptions" data-twe-slide-to="0" data-twe-carousel-active
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-twe-target="#carouselExampleCaptions" data-twe-slide-to="1"
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-label="Slide 2"></button>
        <button type="button" data-twe-target="#carouselExampleCaptions" data-twe-slide-to="2"
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-label="Slide 3"></button>
    </div>
    <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
            data-twe-carousel-active data-twe-carousel-item style="backface-visibility: hidden">
            <div class="relative overflow-hidden bg-cover bg-no-repeat" style="background-position: 50%">
                <img src="https://tecdn.b-cdn.net/img/Photos/Slides/img%20(123).jpg" class="block w-full" />
                <div
                    class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-black bg-fixed opacity-50">
                </div>
            </div>
            <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                <h5 class="text-xl">First slide label</h5>
                <p>
                    Some representative placeholder content for the first slide.
                </p>
            </div>
        </div>
        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
            data-twe-carousel-item style="backface-visibility: hidden">
            <div class="relative overflow-hidden bg-cover bg-no-repeat" style="background-position: 50%">
                <img src="https://tecdn.b-cdn.net/img/Photos/Slides/img%20(124).jpg" class="block w-full" />
                <div
                    class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-black bg-fixed opacity-50">
                </div>
            </div>
            <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                <h5 class="text-xl">Second slide label</h5>
                <p>
                    Some representative placeholder content for the second slide.
                </p>
            </div>
        </div>
        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
            data-twe-carousel-item style="backface-visibility: hidden">
            <div class="relative overflow-hidden bg-cover bg-no-repeat" style="background-position: 50%">
                <img src="https://tecdn.b-cdn.net/img/Photos/Slides/img%20(125).jpg" class="block w-full" />
                <div
                    class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-black bg-fixed opacity-50">
                </div>
            </div>
            <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                <h5 class="text-xl">Third slide label</h5>
                <p>
                    Some representative placeholder content for the third slide.
                </p>
            </div>
        </div>
    </div>
    <button
        class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
        type="button" data-twe-target="#carouselExampleCaptions" data-twe-slide="prev">
        <span class="inline-block h-8 w-8">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </span>
        <span
            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
    </button>
    <button
        class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
        type="button" data-twe-target="#carouselExampleCaptions" data-twe-slide="next">
        <span class="inline-block h-8 w-8">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </span>
        <span
            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
    </button>
</div>
@endsection


@section('about')
<section class="mb-16">
    <div
        class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
        <div class="flex flex-wrap">
            <div
                class="px-6 py-12 shrink-0 grow-0 basis-auto w-full flex flex-wrap flex-row justify-center lg:justify-start lg:flex-col items-center lg:flex lg:w-6/12 xl:w-4/12 order-2 lg:order-1">

                @foreach ($descriptionItems as $cardName => $cardsItems)
                    <div
                        class="mt-4 w-full max-w-[18rem] rounded-lg bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
                        <h2 class="mb-4 px-4 text-2xl font-bold">
                            {{ $cardName }}:
                        </h2>

                        <ul class="w-full">
                            @foreach ($cardsItems as $item)
                                @if($item === end($cardsItems))
                                    <li class="w-full p-4">{{ $item['name'] }}</li>
                                @else 
                                    <li class="w-full border-b-2 border-neutral-100 border-opacity-100 p-4  dark:border-white/10">
                                        {{ $item['name'] }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endforeach

            </div>

            <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12 order-1 lg:order-2">
                <div class="px-6 py-12">
                    <h2 class="mb-4 text-2xl font-bold">
                        About
                    </h2>
                    <p class="mb-6 flex items-center font-bold uppercase text-danger dark:text-danger-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="mr-2 h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                        </svg>
                        {{ $project_production_stage }}
                    </p>
                    {!! $project->body !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection