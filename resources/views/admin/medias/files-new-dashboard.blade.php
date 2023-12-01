@extends('layouts.project')

@section('title', 'File Dashboard')

@section('description', 'Edit file')


@section('main')
<main data-ui="main-file" class="w-full">

    <!-- Bread -->
    <nav
        class="w-full rounded-md bg-neutral-100 px-5 py-3 dark:bg-neutral-600">
        <ol class="list-reset flex">
            <li>
            <a
                href="{{ route('dashboard') }}"
                class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
                >Dashboard</a
            >
            </li>
            <li>
                <span class="mx-2 text-neutral-500 dark:text-neutral-300">/</span>
            </li>
            <li>
            <a
                href="{{ route('medias.dashboard-files.index') }}"
                class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
                >Files</a
            >
            </li>
            <li>
                <span class="mx-2 text-neutral-500 dark:text-neutral-300">/</span>
            </li>
            <li class="break-all overflow-hidden text-ellipsis text-neutral-500 dark:text-neutral-300">{{ $file->full_name }}</li>
        </ol>
    </nav>
    <!-- Bread END -->

    <h2 class="mt-9 mb-5 px-4 font-bold">
        <div class="flex col-gap-1 items-center">
            
            <input type="text" name="title" id="title" disabled value="{{ $file->full_name }}" 
                class="w-full break-all overflow-hidden text-ellipsis">

                @if($file->id)
                <submit-changes 
                    apiAction="PATCH" 
                    apiPoint="{{ route('media.update', ['medium'=>$file->id ]) }}" 
                    event-bus-name="eventBusProjectEdit" itemClass="media" itemId="{{ $file->id }}" 
                    scopeselector="[data-ui='main-file']" 
                    toincludeidentifier="[mediaData]" />
                @else
                <submit-changes 
                    apiAction="POST" 
                    apiPoint="{{ route('media.store') }}" 
                    event-bus-name="eventBusProjectEdit" 
                    itemClass="media" itemId="{{ $file->id }}" 
                    scopeselector="[data-ui='main-file']" 
                    toincludeidentifier="[mediaData]" />
                @endif
        </div>
    </h2>
    
    <!-- File table -->
    <div class="flex flex-col">
        <div class="overflow-x-auto ">
            <div class="inline-block min-w-full ">
                <div class="overflow-hidden">
                    <table 
                        class="flex flex-col min-w-full text-left text-sm font-light bg-white">
                        <thead 
                            class="border-b font-medium dark:border-neutral-500">
                            <tr class="flex">
                                <th scope="col" class="flex-none w-[40px] px-2 py-4">ID</th>
                                <th scope="col" class="flex-1 px-2 py-4 break-all overflow-hidden text-ellipsis">Full Name</th>
                                <th scope="col" class="flex-none w-[120px] px-2 py-4">File Type</th>
                                <th scope="col" class="flex-none w-[120px] px-2 py-4">Wrap</th>
                            </tr>
                        </thead>
                        <tbody class="flex flex-col">
                            <tr class="flex justify-between border-b dark:border-neutral-500">
                                <td class="flex-none w-[40px] px-2 py-4 font-medium">{{ $file->id }}</td>
                                <td class="flex-1 px-2 py-4 break-all overflow-hidden text-ellipsis">{{ $file->full_name }}</td>
                                <td class="flex-none w-[120px] px-2 py-4">{{ $file->type }}</td>
                                <td class="flex-none w-[120px] px-2 py-4">{{ $file->wrap }}</td>
                            </tr>                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- File table END -->


    <div class="flex flex-col md:flex-row my-8">
        <section class="w-1/1 md:w-3/4">

            <!-- Main content -->
            <h3>Preview</h3>

            <!-- IMG -->
            <?php 
            if( !$file->id ): ?>
            <image-drag-drop-upload
                name="dragDropUploadFiles"
                event-bus-name="eventBusProjectEdit" 
                mediaData
                apiPoint="{{ route('upload-image.store') }}"
            >
            <?php 
            endif ?>
            
            @isset($file->id)
            <img width="300px" src="{{ asset('storage/images/' . $file->full_name ) }}" alt="image2" />
            @endisset
            <!-- Main content END -->
            

        </section>


        <aside class="w-1/1 md:w-1/4 px-4">

            <!-- Description -->
            <h3>Description</h3>
            <div class="relative mb-3" data-te-input-wrapper-init>
            <textarea
                class="text-xs leading-[16px] peer block min-h-[8rem] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="fileDescription"
                name="fileDescription"
                mediaData
                rows="3"
                placeholder="Short info...">{{ $file->description }}</textarea>
            <label
                for="fileDescription"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                >Info on item</label
            >
            </div>
            <!-- Description END -->

            <!-- Settings -->
            <h3>Settings</h3>
            <div class="rounded-md border p-1">

                <!--Alt -->
                 <div class="relative mb-3" data-te-input-wrapper-init>
                    <input
                        type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.33rem] text-xs leading-[1.5] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="fileAlt"
                        name="fileAlt"
                        mediaData
                        placeholder="Alt text"
                        value=""/>
                        <!-- disabled -->
                    <label
                        for="fileAlt"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] text-xs leading-[1.5] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.75rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.75rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                        >Alt
                    </label>
                </div>
                <!--Alt END -->


            </div>
            <!-- Settings End -->
        </aside>
    </div>



</main>
@endsection