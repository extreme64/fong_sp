<!-- home.blade.php -->
@extends('layouts.page') 

@section('title', 'Store Forward Creating')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen  dark:bg-gray-900 py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">



            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                
                            
                <!-- Jumbotron -->
                <div class="px-6 py-12 text-center md:px-12 lg:text-left">
                    <div class="w-100 mx-auto sm:max-w-2xl md:max-w-3xl lg:max-w-5xl xl:max-w-7xl xl:px-32">
                    <div class="grid items-center lg:grid-cols-2">
                        <div class="mb-12 md:mt-12 lg:mt-0 lg:mb-0">
                        <div class="block rounded-lg bg-[hsla(0,0%,100%,0.55)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-[hsla(0,0%,5%,0.55)] dark:shadow-black/20 md:px-12 lg:-mr-14 backdrop-blur-[30px]">
                            <h1 class="mt-2 mb-16 text-4xl font-bold tracking-tight md:text-5xl xl:text-6xl">
                            Welcome to <br/><span class="text-primary">@ Forward Creating</span>
                            </h1>
                            <h2>Store</h2>
                            <p>Explore development projects.</p>
                            <p>Support develpment if you so choose kind person.</p>
                            <br/>
                            <p>
                                <a class="mb-2 inline-block rounded bg-primary px-12 pt-4 pb-3.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] md:mr-2 md:mb-0" data-te-ripple-init data-te-ripple-color="light" href="/" role="button">Projects</a>

                                <a class="inline-block rounded px-12 pt-4 pb-3.5 text-sm font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 dark:hover:bg-neutral-700 dark:hover:bg-opacity-40" data-te-ripple-init data-te-ripple-color="light" href="/about" role="button">About</a>
                            </p>
                        </div>
                        </div>
                        <div class="md:mb-12 lg:mb-0">
                        <img src="{{ asset('/images/misc/software-development-solutions-rct-g2.svg') }}" class="w-full rounded-lg shadow-lg dark:shadow-black/20" alt="" />
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Jumbotron -->
            </div>


            <section class="mb-32 mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

                <div class="grid gap-6 md:grid-cols-1 lg:grid-cols-4">
                    <ul class="flex justify-center flex-wrap">
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/mdb-new.png"
                            alt="" class="mr-3 w-6" />
                            <span>MDBootstrap</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/react.png"
                            alt="" class="mr-3 w-6" />
                            <span>React</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/angular.png"
                            alt="" class="mr-3 w-6" />
                            <span>Angular</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/vue.png"
                            alt="" class="mr-3 w-6" />
                            <span>Vue</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/wordpress.png"
                            alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>WordPress</span>
                        </a>
                        </li>
                    </ul>
                    <ul class="flex justify-center flex-wrap">
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/laravel.png"
                            alt="" class="mr-3 w-6" />
                            <span>Laravel</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/nodejs.png"
                            alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>Node.js</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/mongodb.png"
                            alt="" class="mr-3 w-6" />
                            <span>Mongo DB</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/python.png"
                            alt="" class="mr-3 w-6" />
                            <span>Python</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/mysql.png"
                            alt="" class="mr-3 w-6" />
                            <span>MySQL</span>
                        </a>
                        </li>
                    </ul>
                    <ul class="flex justify-center flex-wrap">
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/php.png"
                            alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>PHP</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/javascript.png"
                            alt="" class="mr-3 w-6" />
                            <span>Pure JavaScript</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/html.png"
                            alt="" class="mr-3 w-6" />
                            <span>Any static website</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/expressjs.png"
                            alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>Express</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/socketio.png"
                            alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>SocketIO</span>
                        </a>
                        </li>
                    </ul>
                    <ul class="flex justify-center flex-wrap">
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/passport.png"
                            alt="" class="mr-3 w-6" />
                            <span>Passport</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/tailwindcss.png"
                            alt="" class="mr-3 w-6" />
                            <span>Tailwind CSS</span>
                        </a>
                        </li>
                        <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img
                            src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/jamstack.png"
                            alt="" class="mr-3 w-6" />
                            <span>Jamstack</span>
                        </a>
                        </li>
                    </ul>
                </div>
                       
            </section>



            <section class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
               
            
            
            
                <!-- Section: Design Block -->
                <div class="mb-32 text-center">
                    <h2 class="mb-20 text-3xl font-bold">
                        Develpment
                    </h2>




                <div class="grid lg:grid-cols-2 lg:gap-x-12">
                <div class="mb-12 lg:mb-6">
                    <div
                    class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <div class="flex justify-center">
                        <div class="-mt-8 inline-block rounded-full bg-primary-100 p-4 text-primary shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                        </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <a href="/project/dev-game-widget" role="link">    
                            <h5 class="mb-4 text-lg font-semibold">Dev Game Widget - browser extension</h5> 
                        </a>
                        <p>
                        The Dev Game Widget is an innovative browser extension designed to enhance the productivity and engagement of developers and tech enthusiasts. This extension brings the excitement of gaming into the development environment, creating a unique and fun experience for users.
                        </p>
                    </div>
                    </div>
                </div>

                <div class="mb-12 lg:mb-6">
                    <div
                    class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <div class="flex justify-center">
                        <div class="-mt-8 inline-block rounded-full bg-primary-100 p-4 text-primary shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <a href="/project/path-designer" role="link">    
                            <h5 class="mb-4 text-lg font-semibold">Path Assistent - mobile application</h5>
                        </a>
                        <p>
                        Path Assistant is a cutting-edge mobile application designed for trail builders, engineers, and outdoor enthusiasts. This powerful tool enables users to design, analyze, and optimize paths and trails on maps, incorporating advanced features to enhance the trail-building experience and encourage collaboration among trail enthusiasts.
                        </p>
                    </div>
                    </div>
                </div>

                <div class="">
                    <div
                    class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <div class="flex justify-center">
                        <div class="-mt-8 inline-block rounded-full bg-primary-100 p-4 text-primary shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <a href="/project/tanks-asylum-2d" role="link">    
                            <h5 class="mb-4 text-lg font-semibold">Tanks Asylum - 2d browser game</h5>
                        </a>
                        <p>
                        Tanks Asylum is an exhilarating 2D browser game that blends turn-based strategy and tactical gameplay, set in a post-apocalyptic world where players command tanks in intense battles. Drawing inspiration from classic games like Heroes of Might and Magic III, Tanks Asylum offers a unique twist by placing tanks at the center of the action.
                        </p>
                    </div>
                    </div>
                </div>

                <div class="">
                    <div
                    class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <div class="flex justify-center">
                        <div class="-mt-8 inline-block rounded-full bg-primary-100 p-4 text-primary shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <a href="/project/local-communities" role="link">    
                            <h5 class="mb-4 text-lg font-semibold">Local Communitis - socail network</h5>
                        </a>
                        <p>
                         Local Communities is an innovative social network designed to foster connections and collaboration among individuals within a specific locality. This platform empowers users to engage with their community, participate in local projects, and organize events based on shared interests and goals.
                        </p>
                    </div>
                    </div>
                </div>
                </div>
                </div>
            </section>
            <!-- Section: Design Block -->
            
            
        


            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-1">
                    <div class="p-6 dark:text-white">
                        



                        <!-- Section: Design Block -->
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
                                            <h2 class="mb-4 text-2xl font-bold">
                                            Dev Game Widget
                                            </h2>
                                            <p class="mb-6 flex items-center font-bold uppercase text-danger dark:text-danger-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" class="mr-2 h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                                            </svg>
                                            GET HERE
                                            </p>
                                           
                                            
                                            <p>With the Dev Game Widget, developers can unleash their creativity, improve problem-solving skills, and find a healthy balance between work and play. Whether it's a coding challenge between colleagues or a moment of relaxation during intense coding sessions, the Dev Game Widget aims to make coding more enjoyable and rewarding.</p>
                            
                                            <h4>Installation and Compatibility:</h4>
                                            
                                            <p>The Dev Game Widget is available as a browser extension for popular browsers such as Chrome, Firefox, and Edge. It integrates seamlessly into the development environment, providing a user-friendly experience without compromising coding efficiency.</p>

                                            <h4>Privacy and Security:</h4>
                                                
                                            <p>The extension adheres to strict privacy and security standards. User data and game progress are securely stored, and the extension does not interfere with sensitive development tools or processes.</p>
                                            
                                            <p>Key Features:</p>

                                            <ul>
                                                <li>Interactive Mini-Games: The extension offers a variety of interactive mini-games, carefully curated to challenge and entertain developers during their coding sessions. From quick puzzles to coding challenges, users can take short breaks while staying in the coding flow.</li>

                                                <li>Points and Rewards System: Users earn points and rewards based on their performance in the mini-games. The points can be used to unlock new game levels, avatars, or other customizable elements, adding a gamification aspect to the development process.</li>

                                                <li>Customizable Avatars: Users can personalize their experience by selecting from a range of fun and quirky avatars. This feature allows developers to showcase their unique personalities while participating in the gaming community.</li>

                                                <li>Leaderboards and Social Sharing: The extension includes leaderboards where users can see their ranking among peers. Developers can share their achievements and high scores on social media, fostering healthy competition and community engagement.</li>

                                                <li>Productivity and Focus Tools: In addition to gaming elements, the extension also includes productivity and focus tools. Users can set customizable reminders, timer-based coding sessions, and break schedules to maintain a balanced work-play environment.</li>

                                                <li>Developer Community: The Dev Game Widget connects developers worldwide, creating a supportive and collaborative community. Users can join coding challenges, participate in coding competitions, and exchange ideas through a dedicated forum.</li>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700"> 
                                <div class="flex flex-wrap items-center">
                                    <div class="hidden shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/088.jpg" alt="Trendy Pants and Shoes"
                                        class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
                                    </div>
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                                        <div class="px-6 py-12 md:px-12 text-sm">
                                            <h2 class="mb-4 text-2xl font-bold">
                                            Path Designer
                                            </h2>
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
                                            <h4>Privacy and Security</h4>

                                            <p>Path Assistant prioritizes data privacy and ensures that user information remains secure. Personal trail data, such as GPS recordings, remains confidential unless explicitly shared by the user.</p>

                                            <h4>Trail Builders' Ultimate Tool:</h4>

                                            <p>With its comprehensive mapping, height profile analysis, and collaborative features, Path Assistant has become the ultimate companion for trail builders, engineers, and outdoor enthusiasts. Whether planning new trails or improving existing ones, Path Assistant empowers users to create memorable and enjoyable experiences for all trail enthusiasts.</p>
                                        
                                            <p>Key Features:</p>

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

                            <div
                                class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                <div class="flex flex-wrap items-center">
                                    <div class="hidden shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/088.jpg" alt="Trendy Pants and Shoes"
                                        class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
                                    </div>
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                                        <div class="px-6 py-12 md:px-12 text-sm">
                                            <h2 class="mb-4 text-2xl font-bold">
                                            Tanks Asylum - 2D Browser Game
                                            </h2>
                                            <p class="mb-6 flex items-center font-bold uppercase text-danger dark:text-danger-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" class="mr-2 h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                                            </svg>
                                            PROTOTYPE
                                            </p>
                                            <p>Tanks Asylum provides an enthralling gaming experience for both casual players and tactical strategists alike. With its unique blend of tank warfare, turn-based strategy, and multiplayer challenges, the game promises countless hours of fun and thrilling battles in the tank-driven post-apocalyptic world.</p>
                        
                                            <h4>Accessibility:</h4>
                                            
                                            <p>Tanks Asylum is a browser-based game, allowing players to dive into epic tank battles without the need for downloads or installations. It runs smoothly on various devices, making it accessible to a wide audience.</p>
                                            
                                            <p>Key Features:</p>

                                            <ul>
                                                <li>Engaging Gameplay: Tanks Asylum provides an engaging and addictive gameplay experience, combining strategy, planning, and skillful execution. Players control tanks as they strategize and maneuver across diverse terrains, making each battle thrilling and unpredictable.</li>

                                                <li>Single and Multiplayer Modes: In the single-player mode, players embark on an epic campaign, encountering various challenges, missions, and opponents. The multiplayer mode allows players to compete against friends or other online players, showcasing their tactical prowess and tank assembly skills.</li>

                                                <li>Custom Team Assembly: Players can assemble their tank squads, each with unique abilities, strengths, and weaknesses. Choose from a wide range of tanks, including heavy armor units, agile scouts, powerful artillery, and more. Craft a team that suits your playstyle and tactical preferences.</li>

                                                <li>Resource Management: As players progress through the game, they must manage resources strategically. Acquire supplies, upgrade tanks, and unlock new technologies to gain an edge in battles.</li>

                                                <li>Strategic Map Exploration: Navigate through beautifully illustrated maps representing various regions of the post-apocalyptic world. Discover hidden treasures, encounter allies, and engage in epic tank battles with enemy factions.</li>

                                                <li>Quests and Challenges: Tanks Asylum offers a variety of quests, challenges, and objectives that keep players immersed and engaged throughout their journey. Completing quests unlocks rewards, upgrades, and new tanks for the team.</li>

                                                <li>Real-Time Turn-Based Battles: The game utilizes a real-time turn-based combat system, where players plan their moves, and actions are executed simultaneously once the turn ends. This dynamic combat mechanic adds excitement and depth to each battle.</li>

                                                <li>Progression and Achievements: Earn achievements, gain experience points, and level up your tank commanders. Progress through ranks and unlock special abilities to become a formidable tank commander.</li>

                                                <li>Community and Events: Join a vibrant community of tank enthusiasts, participate in events, and compete in tournaments to prove your skills on the battlefield.</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                <div class="flex flex-wrap items-center">
                                    <div class="hidden shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/088.jpg" alt="Trendy Pants and Shoes"
                                        class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
                                    </div>
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                                        <div class="px-6 py-12 md:px-12 text-sm">
                                            <h2 class="mb-4 text-2xl font-bold">
                                            Local Communities - Social Network
                                            </h2>
                                            <p class="mb-6 flex items-center font-bold uppercase text-danger dark:text-danger-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" class="mr-2 h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                                            </svg>
                                            TBA
                                            </p>
                                            <p>Local Communities is more than just a social network; it's a platform for positive   change and meaningful connections within local neighborhoods. From creating project blueprints to organizing events and leveraging available resources, users can come together to shape a vibrant and thriving community.</p>
                        
                                            <h4>Empowering Local Collaboration:</h4>
                                            
                                            <p>Local Communities aims to empower individuals to actively contribute to their local area's development and foster a stronger sense of community. By connecting people with shared interests and enabling collaborative initiatives, the social network serves as a hub for positive local impact.</p>
                                            
                                            <p>Key Features:</p>
                                            
                                            <ul>
                                                <li>Local Project Blueprints: Local Communities allows users to create and share project blueprints within their community. These blueprints outline ideas and plans for various projects, initiatives, or events that can benefit the local area.</li>

                                                <li>Events and Meetups: Users can organize events and meetups based on the blueprints shared by the community. Whether it's a community cleanup, a workshop, or a cultural event, users can collaborate and participate in activities that contribute to the local area's growth and well-being.</li>

                                                <li>Advanced Search Functionality: The platform offers a comprehensive search feature that enables users to find events and projects based on their interests, available timeframes, and the area or distance from their location. Users can easily discover opportunities that align with their passions and availability.</li>

                                                <li>Event Participation and RSVP: Users can apply to join events and meetups organized by others. The RSVP feature allows event organizers to manage attendee counts effectively and plan accordingly.</li>

                                                <li>Resource Registration: Local Communities enables users to register their resources, such as skills, tools, or materials, which can be valuable assets for various projects in the community. This resource pool facilitates better collaboration and utilization of available resources.</li>

                                                <li>Blueprint Creation: Users can transform their ideas into tangible project blueprints within the platform. They can collaborate with others to fine-tune the details, gather support, and work together to turn blueprints into reality.</li>

                                                <li>Community Engagement: The social network encourages active community engagement through discussions, comments, and sharing of ideas. Users can provide feedback, ask questions, and interact with others interested in similar projects or events.</li>

                                                <li>Privacy and Local Focus: Local Communities prioritizes user privacy and emphasizes a local focus. The platform fosters connections within a specific locality, promoting a sense of belonging and ownership among users.</li>

                                                <li>GPS Tracking and Offline Usage: Path Assistant includes GPS tracking, allowing users to record their routes while exploring trails in the real world. Additionally, the app supports offline map usage, ensuring functionality even in remote areas with limited connectivity.</li>

                                                <li>Collaboration and Community Engagement: Users can join a vibrant community of trail builders and enthusiasts, where they can share their trail designs, exchange ideas, and seek advice from experienced trail engineers.</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Section: Design Block -->
                    </div>
                                           
                
                </div>
            </div>
        </div>
    </div>
@endsection