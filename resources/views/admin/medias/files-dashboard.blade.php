@extends('layouts.project')

@section('title', 'Files Dashboard')

@section('description', 'Add or edit files. Use in projects, awards etc.')


@section('main')
<main class="w-full">

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
            <li class="text-neutral-500 dark:text-neutral-300">Files</li>
        </ol>
    </nav>
    <!-- Bread END -->

    <!-- Files table -->
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full">
                <div class="overflow-hidden">
                    <table 
                        data-ui="files-list-main" 
                        class="flex flex-col min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr class="flex">
                                <th scope="col" class="flex-none w-[40px] px-2 py-4">ID</th>
                                <th scope="col" class="flex-1 px-2 py-4 break-all overflow-hidden text-ellipsis">Full Name</th>
                                <th scope="col" class="flex-none w-[100px] px-2 py-4 overflow-hidden text-ellipsis">Meme Type</th>
                                <th scope="col" class="flex-none w-[80px] px-2 py-4">Preview</th>
                                <th scope="col" class="flex-none w-[80px] px-2 py-4">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                            <tr 
                                data-ui="files-list-item-tr-file-{{ $file->id }}" 
                                class="flex border-b dark:border-neutral-500">
                                <td class="flex-none w-[40px] px-2 py-4 font-medium">{{ $file->id }}</td>
                                <td class="flex-1 px-2 py-4 break-all overflow-hidden text-ellipsis" title="{{ $file->description }}">{{ $file->full_name }}</td>
                                <td class="flex-none w-[100px] px-2 py-4 overflow-hidden text-ellipsis">{{ $file->wrap }}</td>
                                <td class="flex-none w-[80px] px-2 py-4">
                                    <img width="30px" src="{{ asset('storage/images/'.$file->full_name ) }}" alt="image" />
                                </td>
                                <td class="flex-none w-[80px] px-2 py-4">
                                    <div class="flex">
                                        <div
                                            class="mx-1 multi-collapse-{{ $file->id }} rounded-lg shadow-lg"
                                            data-te-class-collapsingHorizontal
                                            data-te-collapse-item
                                            id="edit-{{$file->id}}">
                                            <div
                                                class="rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                                                <a href="{{ route('dashboard.files.edit', ['id'=>$file->id]) }}">
                                                    <svg width="24px" height="24px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M15.48 3H7.52C4.07 3 2 5.06 2 8.52V16.47C2 19.94 4.07 22 7.52 22H15.47C18.93 22 20.99 19.94 20.99 16.48V8.52C21 5.06 18.93 3 15.48 3Z" fill="#0073ff"></path> <path d="M21.0195 2.97979C19.2295 1.17979 17.4795 1.13979 15.6395 2.97979L14.5095 4.09979C14.4095 4.19979 14.3795 4.33979 14.4195 4.46979C15.1195 6.91979 17.0795 8.87979 19.5295 9.57979C19.5595 9.58979 19.6095 9.58979 19.6395 9.58979C19.7395 9.58979 19.8395 9.54979 19.9095 9.47979L21.0195 8.35979C21.9295 7.44979 22.3795 6.57979 22.3795 5.68979C22.3795 4.78979 21.9295 3.89979 21.0195 2.97979Z" fill="#0073ff"></path> <path d="M17.8591 10.4198C17.5891 10.2898 17.3291 10.1598 17.0891 10.0098C16.8891 9.88984 16.6891 9.75984 16.4991 9.61984C16.3391 9.51984 16.1591 9.36984 15.9791 9.21984C15.9591 9.20984 15.8991 9.15984 15.8191 9.07984C15.5091 8.82984 15.1791 8.48984 14.8691 8.11984C14.8491 8.09984 14.7891 8.03984 14.7391 7.94984C14.6391 7.83984 14.4891 7.64984 14.3591 7.43984C14.2491 7.29984 14.1191 7.09984 13.9991 6.88984C13.8491 6.63984 13.7191 6.38984 13.5991 6.12984C13.4691 5.84984 13.3691 5.58984 13.2791 5.33984L7.89912 10.7198C7.54912 11.0698 7.20912 11.7298 7.13912 12.2198L6.70912 15.1998C6.61912 15.8298 6.78912 16.4198 7.17912 16.8098C7.50912 17.1398 7.95912 17.3098 8.45912 17.3098C8.56912 17.3098 8.67912 17.2998 8.78912 17.2898L11.7591 16.8698C12.2491 16.7998 12.9091 16.4698 13.2591 16.1098L18.6391 10.7298C18.3891 10.6498 18.1391 10.5398 17.8591 10.4198Z" fill="#0073ff"></path> </g></svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div
                                            class="mx-1 multi-collapse-{{ $file->id }} rounded-lg shadow-lg"
                                            data-te-collapse-item
                                            data-te-class-collapsingHorizontal
                                            id="hide-{{ $file->id }}">
                                            <div
                                                class="rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                                                <!-- TODO: Add api point -->
                                                <delete-item event-bus-name="eventBusProjectEdit" 
                                                    projectid="{{ $file->id }}" 
                                                    apipoint="{{ route('media.destroy', ['medium' =>  $file->id ]) }}" 
                                                    itemname="file" 
                                                    scopeselector="[data-ui='files-list-main']" 
                                                    toincludeidentifier="[data-ui='files-list-item-tr-file-{{ $file->id }}']" />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Files table END -->

</main>
@endsection