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
                            <div
                                class="block rounded-lg bg-[hsla(0,0%,100%,0.55)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-[hsla(0,0%,5%,0.55)] dark:shadow-black/20 md:px-12 lg:-mr-14 backdrop-blur-[30px]">
                                <h1 class="mt-2 mb-16 text-4xl font-bold tracking-tight md:text-5xl xl:text-6xl">
                                    Welcome to <br /><span class="text-primary">@ Forward Creating</span>
                                </h1>

                                <h2>Idea</h2>

                                <p>Crafting cutting-edge solutions that make a real difference in people's lives.</p>

                                <p>Explore development projects.</p>

                                <p>
                                    <a href="/" data-twe-ripple-init data-twe-ripple-color="light"
                                        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                        Projects</a>
                                    <a href="/about" data-twe-ripple-init data-twe-ripple-color="dark"
                                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 motion-reduce:transition-none dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400">
                                        About</a>
                                </p>
                            </div>
                        </div>
                        <div class="md:mb-12 lg:mb-0">
                            <img src="{{ asset('/images/misc/software-development-solutions-rct-g2.svg') }}"
                                class="w-full rounded-lg shadow-lg dark:shadow-black/20" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->
        </div>


        <!-- Tech stack -->
        <section class="mb-32 mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid gap-6 md:grid-cols-1 lg:grid-cols-4">
                <ul class="flex justify-center flex-wrap">
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/mdb-new.png"
                                alt="" class="mr-3 w-6" />
                            <span>MDBootstrap</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/react.png"
                                alt="" class="mr-3 w-6" />
                            <span>React</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/angular.png"
                                alt="" class="mr-3 w-6" />
                            <span>Angular</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/vue.png"
                                alt="" class="mr-3 w-6" />
                            <span>Vue</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/wordpress.png"
                                alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>WordPress</span>
                        </a>
                    </li>
                </ul>
                <ul class="flex justify-center flex-wrap">
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/laravel.png"
                                alt="" class="mr-3 w-6" />
                            <span>Laravel</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/nodejs.png"
                                alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>Node.js</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/mongodb.png"
                                alt="" class="mr-3 w-6" />
                            <span>Mongo DB</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/python.png"
                                alt="" class="mr-3 w-6" />
                            <span>Python</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/mysql.png"
                                alt="" class="mr-3 w-6" />
                            <span>MySQL</span>
                        </a>
                    </li>
                </ul>
                <ul class="flex justify-center flex-wrap">
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/php.png"
                                alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>PHP</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/javascript.png"
                                alt="" class="mr-3 w-6" />
                            <span>Pure JavaScript</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/html.png"
                                alt="" class="mr-3 w-6" />
                            <span>Any static website</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/expressjs.png"
                                alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>Express</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/socketio.png"
                                alt="" class="mr-3 w-6 dark:brightness-200" />
                            <span>SocketIO</span>
                        </a>
                    </li>
                </ul>
                <ul class="flex justify-center flex-wrap">
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/passport.png"
                                alt="" class="mr-3 w-6" />
                            <span>Passport</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/tailwindcss.png"
                                alt="" class="mr-3 w-6" />
                            <span>Tailwind CSS</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex w-full items-center whitespace-nowrap bg-transparent py-3 px-4 text-sm font-normal text-neutral-700 transition duration-300 ease-in-out hover:bg-neutral-50 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>
                            <img src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/_assets/img/icons/jamstack.png"
                                alt="" class="mr-3 w-6" />
                            <span>Jamstack</span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Tech stack END -->



        <section class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">


            <!-- Section: Design Block -->
            <div class="mb-32 text-center">

                <h2 class="mb-20 text-3xl font-bold">
                    Develpment
                </h2>

                <div class="grid lg:grid-cols-2 lg:gap-x-12">
                    <div class="project-preview-card mb-12 lg:mb-12">
                        <div
                            class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <div class="flex justify-center">
                                <div class="-mt-8 inline-block rounded-full bg-primary-100 p-4 text-primary shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="h-7 w-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6">
                                <a href="/project/dev-game-widget" role="link">
                                    <h3 class="mb-4 text-lg font-semibold">
                                        Dev Game Widget</h3>
                                </a>

                                <h4 class="no-glob-styles">
                                    Browser extension</h4>

                                <p>
                                    The Dev Game Widget is an innovative browser extension designed to enhance the
                                    productivity and engagement of developers and tech enthusiasts. This extension
                                    brings the excitement of gaming into the development environment, creating a unique
                                    and fun experience for users.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-12 lg:mb-12">
                        <div
                            class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <div class="flex justify-center">
                                <div class="-mt-8 inline-block rounded-full bg-primary-100 p-4 text-primary shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="h-7 w-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6">
                                <a href="/project/path-designer" role="link">
                                    <h3 class="mb-4 text-lg font-semibold">
                                        Path Assistent</h3>
                                </a>

                                <h4 class="no-glob-styles">
                                    Mobile application</h4>

                                <p>
                                    Path Assistant is a cutting-edge mobile application designed for trail builders,
                                    engineers, and outdoor enthusiasts. This powerful tool enables users to design,
                                    analyze, and optimize paths and trails on maps, incorporating advanced features to
                                    enhance the trail-building experience and encourage collaboration among trail
                                    enthusiasts.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-12 lg:mb-12">
                        <div
                            class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <div class="flex justify-center">
                                <div class="-mt-8 inline-block rounded-full bg-primary-100 p-4 text-primary shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="h-7 w-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6">
                                <a href="/project/tanks-asylum-2d" role="link">
                                    <h3 class="mb-4 text-lg font-semibold">
                                        Tanks Asylum</h3>
                                </a>

                                <h4 class="no-glob-styles">
                                    2D browser game</h4>

                                <p>
                                    Tanks Asylum is an exhilarating 2D browser game that blends turn-based strategy and
                                    tactical gameplay, set in a post-apocalyptic world where players command tanks in
                                    intense battles. Drawing inspiration from classic games like Heroes of Might and
                                    Magic III, Tanks Asylum offers a unique twist by placing tanks at the center of the
                                    action.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-12 lg:mb-12">
                        <div
                            class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <div class="flex justify-center">
                                <div class="-mt-8 inline-block rounded-full bg-primary-100 p-4 text-primary shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="h-7 w-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6">
                                <a href="/project/local-communities" role="link">
                                    <h3 class="mb-4 text-lg font-semibold">
                                        Local Communitis</h3>
                                </a>

                                <h4 class="no-glob-styles">
                                    Social network</h4>

                                <p>
                                    Local Communities is an innovative social network designed to foster connections and
                                    collaboration among individuals within a specific locality. This platform empowers
                                    users to engage with their community, participate in local projects, and organize
                                    events based on shared interests and goals.
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

                @include('partials.join-now')
                   
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-1">
                <div class="dark:text-white">

                @include('partials.subscribe')
                   
                </div>
            </div>
        </div>

    </div>
</div>
@endsection