@extends('layouts.page')

@section('content')
<div class="container">
    <div class="profile relative flex items-top justify-center min-h-screen dark:bg-gray-900 py-4 sm:pt-0">
        <div class="w-full max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-1 bg-white shadow-lg rounded-lg">


                <div class="bg-gray-800 text-white py-4 px-6 rounded-t-lg">
                    <h1>
                        {{ __('Profile') }}
                    </h1>
                </div>
                <div class="p-6 py-4 px-6 rounded-t-lg">  
                    @if (session('status'))
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md mb-4">
                        {{ session('status') }}
                    </div>
                    @endif


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
                                
            
                                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
                            


                                    <div class="flex flex-col max-w-md sm:flex sm:space-x-6 dark:bg-gray-900 dark:text-gray-100">

                                        <div class="flex flex-col">
                                            
                    
                                            <h2 class="mb-5">{{ __('Info') }}</h2>
                                            <div class="flex flex-col items-center">
                                                <div class="flex-shrink-0 mb-6 h-44 sm:h-32 sm:w-32 sm:mb-0">
                                                    <img src="{{ asset('storage/images/'.$user->full_name ) }}" alt="" class="object-cover object-center w-full h-full rounded dark:bg-gray-500">
                                                </div>
                                                <div class="flex p-4 flex-col space-y-4">
                                                    <div>
                                                        <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                                                        <span class="text-sm dark:text-gray-400">Admin</span>
                                                    </div>
                                                    <div class="flex-col items-center space-y-1">
                                                        <span class="flex items-center space-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-label="Email address" class="w-4 h-4">
                                                                <path fill="currentColor" d="M274.6,25.623a32.006,32.006,0,0,0-37.2,0L16,183.766V496H496V183.766ZM464,402.693,339.97,322.96,464,226.492ZM256,51.662,454.429,193.4,311.434,304.615,256,268.979l-55.434,35.636L57.571,193.4ZM48,226.492,172.03,322.96,48,402.693ZM464,464H48V440.735L256,307.021,464,440.735Z"></path>
                                                            </svg>
                                                            <span class="dark:text-gray-400">
                                                                <label for="email"></label><span name="email">{{ $user->email }}</span>
                                                            </span>
                                                        </span>
                                                        <span class="flex items-center space-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-label="Phonenumber" class="w-4 h-4">
                                                                <path fill="currentColor" d="M449.366,89.648l-.685-.428L362.088,46.559,268.625,171.176l43,57.337a88.529,88.529,0,0,1-83.115,83.114l-57.336-43L46.558,362.088l42.306,85.869.356.725.429.684a25.085,25.085,0,0,0,21.393,11.857h22.344A327.836,327.836,0,0,0,461.222,133.386V111.041A25.084,25.084,0,0,0,449.366,89.648Zm-20.144,43.738c0,163.125-132.712,295.837-295.836,295.837h-18.08L87,371.76l84.18-63.135,46.867,35.149h5.333a120.535,120.535,0,0,0,120.4-120.4v-5.333l-35.149-46.866L371.759,87l57.463,28.311Z"></path>
                                                            </svg>
                                                            <label for="date-started">Date Started: </label><span class="dark:text-gray-400" name="date-started">{{ $user->created_at }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>



                                               

                                    </div>
                                    <div class="flex flex-col max-w-md sm:flex sm:space-x-6 dark:bg-gray-900 dark:text-gray-100">


                                            <h2 class="mb-5">{{ __('Statistics') }}</h2>
                                                    
                                            <section class="my-6 dark:bg-gray-800 dark:text-gray-100">
                                                <div class="grid grid-cols-1 mt-8 gap-2 sm:grid-cols-2 lg:grid-cols-2">
                                                    <div class="flex space-x-4 rounded-lg md:space-x-6 dark:bg-gray-900 dark:text-gray-100">
                                                        <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 dark:bg-violet-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="h-9 w-9 dark:text-gray-800">
                                                                <polygon points="160 96.039 160 128.039 464 128.039 464 191.384 428.5 304.039 149.932 304.039 109.932 16 16 16 16 48 82.068 48 122.068 336.039 451.968 336.039 496 196.306 496 96.039 160 96.039"></polygon>
                                                                <path d="M176.984,368.344a64.073,64.073,0,0,0-64,64h0a64,64,0,0,0,128,0h0A64.072,64.072,0,0,0,176.984,368.344Zm0,96a32,32,0,1,1,32-32A32.038,32.038,0,0,1,176.984,464.344Z"></path>
                                                                <path d="M400.984,368.344a64.073,64.073,0,0,0-64,64h0a64,64,0,0,0,128,0h0A64.072,64.072,0,0,0,400.984,368.344Zm0,96a32,32,0,1,1,32-32A32.038,32.038,0,0,1,400.984,464.344Z"></path>
                                                            </svg>
                                                        </div>
                                                        <div class="flex flex-col justify-center items-center align-middle">
                                                            <p class="text-3xl font-semibold leadi">{{ count($projectsQuests) }}</p>
                                                            <p class="capitalize">Quests</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex space-x-4 rounded-lg md:space-x-6 dark:bg-gray-900 dark:text-gray-100">
                                                        <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 dark:bg-violet-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="h-9 w-9 dark:text-gray-800">
                                                                <path d="M256,16C123.452,16,16,123.452,16,256S123.452,496,256,496,496,388.548,496,256,388.548,16,256,16ZM403.078,403.078a207.253,207.253,0,1,1,44.589-66.125A207.332,207.332,0,0,1,403.078,403.078Z"></path>
                                                                <path d="M256,384A104,104,0,0,0,360,280H152A104,104,0,0,0,256,384Z"></path>
                                                                <polygon points="205.757 228.292 226.243 203.708 168 155.173 109.757 203.708 130.243 228.292 168 196.827 205.757 228.292"></polygon>
                                                                <polygon points="285.757 203.708 306.243 228.292 344 196.827 381.757 228.292 402.243 203.708 344 155.173 285.757 203.708"></polygon>
                                                            </svg>
                                                        </div>
                                                        <div class="flex flex-col justify-center items-center align-middle">
                                                            <p class="text-3xl font-semibold leadi">{{ $avrScore }}</p>
                                                            <p class="capitalize">Arg. Score</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex space-x-4 rounded-lg md:space-x-6 dark:bg-gray-900 dark:text-gray-100">
                                                        <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 dark:bg-violet-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="h-9 w-9 dark:text-gray-800">
                                                                <path d="M425.706,142.294A240,240,0,0,0,16,312v88H160V368H48V312c0-114.691,93.309-208,208-208s208,93.309,208,208v56H352v32H496V312A238.432,238.432,0,0,0,425.706,142.294Z"></path>
                                                                <rect width="32" height="32" x="80" y="264"></rect>
                                                                <rect width="32" height="32" x="240" y="128"></rect>
                                                                <rect width="32" height="32" x="136" y="168"></rect>
                                                                <rect width="32" height="32" x="400" y="264"></rect>
                                                                <path d="M297.222,335.1l69.2-144.173-28.85-13.848L268.389,321.214A64.141,64.141,0,1,0,297.222,335.1ZM256,416a32,32,0,1,1,32-32A32.036,32.036,0,0,1,256,416Z"></path> 
                                                            </svg>
                                                        </div>
                                                        <div class="flex flex-col justify-center items-center align-middle">
                                                            <p class="text-3xl font-semibold leadi">{{ $avrLevel }}</p>
                                                            <p class="capitalize">Arg. Level</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex space-x-4 rounded-lg md:space-x-6 dark:bg-gray-900 dark:text-gray-100">
                                                        <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 dark:bg-violet-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="h-9 w-9 dark:text-gray-800">
                                                                <path d="M454.423,278.957,328,243.839v-8.185a116,116,0,1,0-104,0V312H199.582l-18.494-22.6a90.414,90.414,0,0,0-126.43-13.367,20.862,20.862,0,0,0-8.026,33.47L215.084,496H472V302.08A24.067,24.067,0,0,0,454.423,278.957ZM192,132a84,84,0,1,1,136,65.9V132a52,52,0,0,0-104,0v65.9A83.866,83.866,0,0,1,192,132ZM440,464H229.3L79.141,297.75a58.438,58.438,0,0,1,77.181,11.91l28.1,34.34H256V132a20,20,0,0,1,40,0V268.161l144,40Z"></path>
                                                            </svg>
                                                        </div>
                                                        <div class="flex flex-col justify-center items-center align-middle">
                                                            <p class="text-3xl font-semibold leadi">{{ $winRate }}%</p>
                                                            <p class="capitalize">Win Rate</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>



                                        </div>
                                           
                                </div>
            
                                <hr class="mb-2"/>

                                <h3>
                                    <a href="{{ route('dashboard.awards.index') }}">{{ __('Awards') }}</a>
                                </h3>
                            
                                <div class="grid sm:grid-cols-2 md:grid-cols-3 md:justify-center grid-cols-6 mt-8 gap-4">
                                    @if(isset($user->awards))
                                        @foreach ($user->awards as $award)
                                        <div class=" border rounded-lg p-4 mx-auto">
                                            <div class="max-w-16 flex flex-col items-center">

                                                <img width="130" src="{{ asset('storage/images/'.$award->full_name) }}" alt="">

                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>



                                <hr class="mb-2"/>

                                <h3>
                                    <a href="{{ route('dashboard.awards.index') }}">{{  __('Quests') }}</a>
                                </h3>

                                <div>
                                
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