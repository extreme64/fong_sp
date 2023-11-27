@extends('layouts.project')

@section('title', 'Project Dashboard')

@section('description', 'Edit contetn and projects')


@section('main')
<main class="sm:w-full md:w-[75%] p-2">

    <!-- Bread -->
    <nav
        class="rounded-md bg-neutral-100 px-5 py-3 dark:bg-neutral-600">
        <ol class="list-reset flex">
            <li class="text-neutral-500 dark:text-neutral-300">Dashboard</li>
        </ol>
    </nav>
    <!-- Bread END -->


    <!-- Stats Section: Design Block -->
    <section class="mb-32 text-center">
        <h2 class="mb-12 text-3xl font-bold">
        There are good reasons to
        <u class="text-primary dark:text-primary-400">be proud</u>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 lg:gap-x-12">
            <div class="mb-12 md:mb-0">
                <div class="mb-6 inline-block rounded-md bg-primary-100 p-4 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                </svg>
                </div>
                <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                346
                </h3>
                <h5 class="text-lg font-medium text-neutral-500 dark:text-neutral-300">
                Users
                </h5>
            </div>

            <div class="mb-12 md:mb-0">
                <div class="mb-6 inline-block rounded-md bg-primary-100 p-4 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                </svg>
                </div>
                <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                1170
                </h3>
                <h5 class="text-lg font-medium text-neutral-500 dark:text-neutral-300">
                Quests
                </h5>
            </div>

            <div class="mb-12 md:mb-0">
                <div class="mb-6 inline-block rounded-md bg-primary-100 p-4 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                </div>
                <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                49
                </h3>
                <h5 class="text-lg font-medium text-neutral-500 dark:text-neutral-300">
                Awards
                </h5>
            </div>

            <div class="mb-12 md:mb-0">
                <div class="mb-6 inline-block rounded-md bg-primary-100 p-4 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                </div>
                <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                13
                </h3>
                <h5 class="text-lg font-medium text-neutral-500 dark:text-neutral-300">
                Products
                </h5>
            </div>
        </div>
    </section>
    <!-- Stats Section: Design Block END -->


   
    <!-- Projects table -->
    <h2 class="mt-9 mb-5 font-bold">PROJECTS</h2>    
    <div class="max-w-full overflow-x-auto">
        <table class="min-w-full divide-y">
            <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                <th scope="col" class="px-6 py-4">ID</th>
                <th scope="col" class="px-6 py-4">Title</th>
                <th scope="col" class="px-6 py-4">Awards</th>
                <th scope="col" class="px-6 py-4">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $prj)
                <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 md:py-4">{{ $prj->id }}</td>
                    <td class="whitespace-nowrap px-6 md:py-4">{{ $prj->title }}</td>
                    <td class="whitespace-nowrap px-6 md:py-4">43</td>
                    <td class="whitespace-nowrap px-6 md:py-4">{{ $prj->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Projects table END -->




    <!-- Awards table -->
    <h2 class="mt-9 mb-5 font-bold">AWARDS</h2>
    <div class="max-w-full overflow-x-auto">
        <table class="min-w-full divide-y">
            <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th scope="col" class="px-6 py-4">ID</th>
                    <th scope="col" class="px-6 py-4">Title</th>
                    <th scope="col" class="px-6 py-4">Type</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($awards as $awd)
                <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 md:py-4 font-medium">{{ $awd->id }}</td>
                    <td class="whitespace-nowrap px-6 md:py-4">{{ $awd->title }}</td>
                    <td class="whitespace-nowrap px-6 md:py-4">{{ $awd->type }}</td>
                    <td class="whitespace-nowrap px-6 md:py-4">{{ $awd->status }}</td>
                    <td class="whitespace-nowrap px-6 md:py-4"><img width="30px" src="{{ asset('images/awards/' . $awd->image ) }}" alt="" /></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
    <!-- Awards table END -->


    <!-- Users table -->
    <h2 class="mt-9 mb-5 font-bold">USERS</h2>
        <div class="max-w-full overflow-x-auto">
        <table class="min-w-full divide-y">
            <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th scope="col" class="px-6 py-4">ID</th>
                    <th scope="col" class="px-6 py-4">Image</th>
                    <th scope="col" class="px-6 py-4">Name</th>
                    <th scope="col" class="px-6 py-4">Email</th>
                    <th scope="col" class="px-6 py-4">Quests</th>
                    <th scope="col" class="px-6 py-4">Awards</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $usr)
                <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $usr->id }}</td>
                    <td class="px-6 py-4 rounded shadow-md w-30 sm:w-20 animate-pulse dark:bg-gray-900">
                        <div class="flex p-4 space-x-4 sm:px-8">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gray-700"></div>
                        </div>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4"><img width="30px" src="http://localhost:8000/images/awards/award_image1.png" alt="" /></td>
                    <td class="whitespace-nowrap px-6 md:py-4">{{ $usr->name }}</td>
                    <td class="whitespace-nowrap px-6 md:py-4">{{ $usr->email }}</td>
                    <td class="whitespace-nowrap px-6 md:py-4">111</td>
                    <td class="whitespace-nowrap px-6 md:py-4">13</td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
    <!-- Users END -->

    <!-- Files gallery -->
    <h2 class="mt-9 mb-5 font-bold">FILES</h2>
    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
        <div class="-m-1 flex flex-wrap md:-m-2">
        
        @foreach($files as $fl)
            <div class="flex w-1/6 h-1/6 aspect-square flex-wrap">
                <div class="w-full p-1 md:p-2">
                    <img 
                        alt="gallery"
                        class="block h-full w-full rounded-lg object-cover object-center"
                        src="{{ asset('storage/images/' . $fl->full_name ) }}" />
                </div>
            </div>
        @endforeach

        </div>
    </div>
    <!-- Files gallery END -->

</main>
@endsection