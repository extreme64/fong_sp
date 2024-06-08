@extends('layouts.dash-page')

@section('content')
<div class="container">
    <div class="relative flex items-top justify-center min-h-screen dark:bg-gray-900 py-4 sm:pt-0">
        <div class="w-full max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-1 bg-white shadow-lg rounded-lg">



                <div class="bg-gray-800 text-white py-4 px-6 rounded-t-lg">
                    <h1>
                        {{ __('Account') }}
                    </h1>
                </div>
                <div class="p-6 py-4 px-6 rounded-t-lg">  
                    @if (session('status'))
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md mb-4">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <script>
                        const userId = {{ $user->id }};
                        const projectId = {{ $showingProjectId }};
                    </script>


                    <!--Tabs navigation-->
                    <ul
                    class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0"
                    role="tablist"
                    data-te-nav-ref>
                    
                        @foreach($userProjects as $index=>$project)
                        <li role="presentation" class="flex-grow basis-0 text-center">
                            <a
                                href="#tabs-{{ $project->id }}"
                                class="<?= ($loop->index === count($userProjects)-1) ? 'disabled' : ''; ?> my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                data-te-toggle="pill"
                                data-te-target="#tabs-{{ $project->id }}"
                                data-te-tab-active
                                role="tab"
                                aria-controls="tabs-{{ $project->id }}" 
                                aria-selected="<?= ($loop->index === 0) ? true : ''; ?>" 
                                <?=  ($loop->index === 0) ? 'data-te-nav-active' : ''; ?> 
                                >
                                {{ $project->title }}
                            </a>
                        </li>
                        @endforeach

                    </ul>
                    <!--Tabs content-->
                    <div class="mb-6">
                      
                        <div
                            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                            id="tabs-1"
                            role="tabpanel"
                            aria-labelledby="tabs-1"
                            data-te-tab-active
                            >
                            
                            <section id="project" class="project mt-16">
                                
            
                                <div class="grid grid-cols-1 md:grid-cols-2">
                            


                                    <div class="flex flex-col max-w-md sm:flex sm:space-x-6 dark:bg-gray-900 dark:text-gray-100">
                                         <div class="flex">

                                            <div>
                                                <div class="flex">    
                                                    <h2 class="mb-5">{{ __('Project Info') }}</h2>
                                                </div>
                                                <section class="my-6 dark:bg-gray-800 dark:text-gray-100">
                                                    <div class="container grid grid-cols-1 gap-6 mx-auto sm:grid-cols-1">
                                                        <div class="flex flex-col lg:flex-row r space-x-4 rounded-lg md:space-x-6 dark:bg-gray-900 dark:text-gray-100">
                                                            <p class="text-2xl lg:text-3xl font-semibold leadi">ABOUT</p>
                                                            <p class="capitalize">
                                                                With the Dev Game Widget, developers can unleash their creativity, improve problem-solving skills, and find a healthy balance between work and play. Dev Game Widget aims to make coding more enjoyable and rewarding.
                                                            </p>
                                                        </div>
                                                        <div class="flex flex-col space-x-4 rounded-lg md:space-x-6 dark:bg-gray-900 dark:text-gray-100">
                                                            <p class="text-xl lg:text-2xl font-semibold leadi">TUTORIAL</p>
                                                            <div class="flex flex-col">
                                                                <p class="capitalize">Stara a quest.</p>
                                                                <p class="capitalize">Use abillities.</p>
                                                                <p class="capitalize">Unloack awards.</p>
                                                                <p class="capitalize">Here, set-up look of the widget.</p>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </section>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="p-1 border rounded-lg border-solid border-2 border-zink-300">
                                        <div>My widget:</div>

                                        <!-- Setup preview -->
                                        <project-attributes-preview 
                                            event-bus-name="eventBusSetup"
                                            user-name="{{ $user->name }}"
                                            avatar-src="{{ $projectUserSetup['avatarImg'] }}"
                                            terminal-src="{{ $projectUserSetup['terminalImg'] }}"
                                            background-src="{{ $projectUserSetup['backgroundImg'] }}"></project-attributes-preview>

                                        <!-- Setup description -->
                                        <project-attributes-description
                                            class="mt-4"
                                            event-bus-name="eventBusSetup"
                                            avatar-title="{{ $projectUserSetup['avatarTitle'] }}"
                                            terminal-title="{{ $projectUserSetup['terminalTitle'] }}"
                                            background-title="{{ $projectUserSetup['backgroundTitle'] }}"
                                            theme-id="{{ $projectUserSetup['theme'] }} .."
                                            theme-data="{{ $themesUIOptions }}"></project-attributes-description>
                                    </div>
                                </div>
            
                                <hr class="mb-2"/>

                                <h3>
                                    <a href="{{ route('dashboard.account.awards') }}">{{ __('Awards') }}</a>
                                </h3>
                            
                                <div class="grid grid-cols-2 mt-8 gap-4 md:grid-cols-3 lg:grid-cols-4">
                                    @if(isset($user->awards))
                                        @foreach ($user->awards as $award)
                                        <div class="flex flex-col justify-between border rounded-lg p-4 mx-auto">
                                            <div class="max-w-16 flex flex-col items-center">

                                                <project-attributes-setting 
                                                    award-id="{{ $award->id }}" 
                                                    award-type="{{ $award->type }}" 
                                                    award-src="{{ asset('images/'.$award->full_name) }}"
                                                    award-title="{{ $award->title }}" 
                                                    event-bus-name="eventBusSetup">
                                                </project-attributes-setting>

                                                <hr/>

                                                
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>



                                <hr class="mb-2"/>

                                <h3>
                                    <a href="{{ route('dashboard.account.awards') }}">{{  __('Quests') }}</a>
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-1">
                                

                                    @foreach ($projectsQuests as $quest)
                                        <project-quest-list class
                                            title="{{ $quest->title }}"
                                            score="{{ $quest->score }}"
                                            level="{{ $quest->level }}"
                                            status="{{ $quest->status }}"
                                            created_at="{{ $quest->created_at }}"
                                            done_at="{{ $quest->done_at }}"
                                            abilities_used="{{ $quest->abilities_used }}"/>
                                    @endforeach


                                </div>

                            </section>

                        </div>
                       
                        <div
                            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                            id="tabs-2"
                            role="tabpanel"
                            aria-labelledby="tabs-2"
                            >
                            <section id="project" class="project mt-16">
                                <h2>
                                {{ __('Info') }}
                                </h2>
            
                                <div class="grid grid-cols-2 md:grid-cols-2">
                                    SOON...
                                </div>
                            </section>
                        </div>

                        <div
                            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                            id="tabs-3"
                            role="tabpanel"
                            aria-labelledby="tabs-3"
                            >
                            Soon...
                        </div>

                        <div
                            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                            id="tabs-4"
                            role="tabpanel"
                            aria-labelledby="tabs-4"
                            >
                            Soon...
                        </div>
                        


                    </div>
                </div>
            </div>           
        </div>
    </div>
</div>
@endsection