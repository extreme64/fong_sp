<!-- about.blade.php -->
@extends('layouts.page') 

@section('title', $title)


@section('content')
    <div class="w-full max-w-6xl mx-auto sm:px-6 lg:px-8 dark:text-white">
        
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-1 dark:text-white">
                <div class="p-6">
                    
                    <h1>Contact Us</h1>

                    <h2>Let's make a positive impact in the world.</h2>
        
                    <div class="my-16 grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                              <!-- Email input -->
                            <div class="mb-4 w-full">
                                <label for="733435f6-5e12-4c6c-af09-2f684df88282"></label>
                                <input placeholder="Your email address" type="email" id="733435f6-5e12-4c6c-af09-2f684df88282"
                                    class="w-full block rounded-lg border dark:border-none dark:bg-neutral-600 py-[9px] px-3 pr-4 text-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-400 focus:outline-none" />
                            </div>


                            <!-- Text input -->
                            <div class="mb-4 w-full">
                                <label for="871e3a2a-1778-4fc9-9a68-7daa8359d6c1"></label>
                                <input placeholder="Your name" type="text" id="871e3a2a-1778-4fc9-9a68-7daa8359d6c1"
                                    class="w-full block rounded-lg border dark:border-none dark:bg-neutral-600 py-[9px] px-3 pr-4 text-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-400 focus:outline-none" />
                            </div>


                            <!-- Text input -->
                            <div class="mb-4 w-full">
                                <label for="0d819da8-a7fe-4eb4-af2d-c128da9daef3"></label>
                                <input placeholder="Topic" type="text" id="0d819da8-a7fe-4eb4-af2d-c128da9daef3"
                                    class="w-full block rounded-lg border dark:border-none dark:bg-neutral-600 py-[9px] px-3 pr-4 text-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-400 focus:outline-none" />
                            </div>


                            <!-- Textarea -->
                            <div class="mb-4 w-full">
                                <label for="520e2966-4675-4fea-8eda-b59ecd8764df"></label>
                                <textarea placeholder="Your message" type="password" id="520e2966-4675-4fea-8eda-b59ecd8764df"
                                    rows="4"
                                    class="w-full block rounded-lg border dark:border-none dark:bg-neutral-600 py-[9px] px-3 pr-4 text-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-400 focus:outline-none"></textarea>
                            </div>


                            <!-- Submit Button -->
                            <button type="submit"
                                class="block mb-4 w-full rounded-full bg-blue-500 text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] hover:bg-blue-600 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-blue-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">Submit</button>
                        </div>

                        <div>
                            <h3>Want To Partner Up?</h3>
                            
                            <p>Got a project in mind? We're always looking for like-minded 
                                individuals and organizations to parter up with. </p>            

                            <p>Get involved today: Contact us to learn more about 
                                how we can join forces.</p>
                        </div>
                    </div>
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
@endsection
