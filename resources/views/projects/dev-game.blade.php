@extends('layouts.page')

@section('title', 'Dev Game Widget')

@section('description', 'The Dev Game Widget is an innovative browser extension designed to enhance the productivity and engagement of developers and tech enthusiasts. This extension brings the excitement of gaming into the development environment')

@section('content')
<div class="content-dev-game relative flex items-top justify-center min-h-screen  dark:bg-gray-900 py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">


            <section class="mb-32">
                <div
                    class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <div class="flex flex-wrap items-center">
                        <div class="hidden shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                        <img src="{{ asset('images/misc/illustrations/dgw.jpg') }}" alt="Trendy Pants and Shoes"
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
                                
                                
                                <p>With2 the Dev Game Widget, developers can unleash their creativity, improve problem-solving skills, and find a healthy balance between work and play. Whether it's a coding challenge between colleagues or a moment of relaxation during intense coding sessions, the Dev Game Widget aims to make coding more enjoyable and rewarding.</p>
                
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
            </section>
        </div>
    </div>
</div>
@endsection