@extends('layouts.project')

@section('title', 'Awards Dashboard')

@section('description', 'Add or edit awards. Asigne to projects.')


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
            <li class="text-neutral-500 dark:text-neutral-300">Awards</li>
        </ol>
    </nav>
    <!-- Bread END -->

    <!-- Awards table -->
    <h2 class="mt-9 mb-5 font-bold">AWARDS</h2>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full">
            <div class="overflow-hidden">
                <table 
                    data-ui="awards-list-main" 
                    class="flex flex-col min-w-full text-left text-sm font-light">
                <thead 
                    class="border-b font-medium dark:border-neutral-500">
                    <tr class="flex">
                        <th scope="col" class="flex-none w-[40px] px-2 py-4">ID</th>
                        <th scope="col" class="flex-1 px-2 py-4">Title</th>
                        <th scope="col" class="flex-none w-[100px] px-2 py-4">Type</th>
                        <th scope="col" class="flex-none w-[80px] px-2 py-4">Status</th>
                        <th scope="col" class="flex-none w-[80px] px-2 py-4">Image</th>
                        <th scope="col" class="flex-none w-[80px] px-2 py-4">Edit</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($awards as $awd)
                    <tr 
                        data-ui="awards-list-item-tr-award-{{ $awd->id }}" 
                        class="flex border-b dark:border-neutral-500">
                        <td class=" flex-none w-[40px] px-2 py-4 font-medium">{{ $awd->id }}</td>
                        <td class=" flex-1 px-2 py-4 overflow-hidden text-ellipsis">{{ $awd->title }}</td>
                        <td class=" flex-none w-[100px] px-2 py-4 overflow-hidden text-ellipsis">{{ $awd->type }}</td>
                        <td class=" flex-none w-[80px] px-2 py-4">
                        <?php
                        if((int)$awd->status === 1): ?>
                            <svg width="32px" height="32px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M21.25 9.14993C18.94 5.51993 15.56 3.42993 12 3.42993C10.22 3.42993 8.49 3.94993 6.91 4.91993C5.33 5.89993 3.91 7.32993 2.75 9.14993C1.75 10.7199 1.75 13.2699 2.75 14.8399C5.06 18.4799 8.44 20.5599 12 20.5599C13.78 20.5599 15.51 20.0399 17.09 19.0699C18.67 18.0899 20.09 16.6599 21.25 14.8399C22.25 13.2799 22.25 10.7199 21.25 9.14993ZM12 16.0399C9.76 16.0399 7.96 14.2299 7.96 11.9999C7.96 9.76993 9.76 7.95993 12 7.95993C14.24 7.95993 16.04 9.76993 16.04 11.9999C16.04 14.2299 14.24 16.0399 12 16.0399Z" fill="#0073ff"></path> <path d="M12.0004 9.13989C10.4304 9.13989 9.15039 10.4199 9.15039 11.9999C9.15039 13.5699 10.4304 14.8499 12.0004 14.8499C13.5704 14.8499 14.8604 13.5699 14.8604 11.9999C14.8604 10.4299 13.5704 9.13989 12.0004 9.13989Z" fill="#0073ff"></path> </g></svg>
                        <?php else: ?>
                            <svg width="32px" height="32px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M21.2496 9.15004C20.7596 8.37004 20.1996 7.67004 19.6196 7.04004L15.8496 10.81C15.9696 11.18 16.0396 11.58 16.0396 12C16.0396 14.24 14.2296 16.04 11.9996 16.04C11.5796 16.04 11.1796 15.97 10.8096 15.85L7.34961 19.31C8.80961 20.13 10.3896 20.56 11.9996 20.56C13.7796 20.56 15.5096 20.04 17.0896 19.07C18.6696 18.09 20.0896 16.66 21.2496 14.84C22.2496 13.28 22.2496 10.72 21.2496 9.15004Z" fill="#292D32"></path> <path d="M14.0206 9.97989L9.98062 14.0199C9.47062 13.4999 9.14062 12.7799 9.14062 11.9999C9.14062 10.4299 10.4206 9.13989 12.0006 9.13989C12.7806 9.13989 13.5006 9.46989 14.0206 9.97989Z" fill="#292D32"></path> <path opacity="0.4" d="M18.25 5.74993L14.86 9.13993C14.13 8.39993 13.12 7.95993 12 7.95993C9.76 7.95993 7.96 9.76993 7.96 11.9999C7.96 13.1199 8.41 14.1299 9.14 14.8599L5.76 18.2499H5.75C4.64 17.3499 3.62 16.1999 2.75 14.8399C1.75 13.2699 1.75 10.7199 2.75 9.14993C3.91 7.32993 5.33 5.89993 6.91 4.91993C8.49 3.95993 10.22 3.42993 12 3.42993C14.23 3.42993 16.39 4.24993 18.25 5.74993Z" fill="#292D32"></path> <path d="M14.8601 12.0001C14.8601 13.5701 13.5801 14.8601 12.0001 14.8601C11.9401 14.8601 11.8901 14.8601 11.8301 14.8401L14.8401 11.8301C14.8601 11.8901 14.8601 11.9401 14.8601 12.0001Z" fill="#292D32"></path> <path d="M21.7709 2.22988C21.4709 1.92988 20.9809 1.92988 20.6809 2.22988L2.23086 20.6899C1.93086 20.9899 1.93086 21.4799 2.23086 21.7799C2.38086 21.9199 2.57086 21.9999 2.77086 21.9999C2.97086 21.9999 3.16086 21.9199 3.31086 21.7699L21.7709 3.30988C22.0809 3.00988 22.0809 2.52988 21.7709 2.22988Z" fill="#292D32"></path> </g></svg>
                        <?php endif ?>
                        </td>
                        
                        <td class="flex-none w-[80px] px-2 py-4">
                            <img width="30px" src="{{ asset('storage/images/'.$awd->full_name ) }}" alt="award illustration" />
                        </td>
                        
                        <td class="flex-none w-[80px] px-2 py-4">
                            <div class="flex">
                                <div
                                    class="mx-1 multi-collapse-{{ $awd->id }} rounded-lg shadow-lg"
                                    data-te-class-collapsingHorizontal
                                    data-te-collapse-item
                                    id="edit-{{$awd->id}}">
                                    <div
                                        class="rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                                        <a href="{{ route('dashboard-award.edit', ['id'=>$awd->id]) }}">
                                            <svg width="24px" height="24px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M15.48 3H7.52C4.07 3 2 5.06 2 8.52V16.47C2 19.94 4.07 22 7.52 22H15.47C18.93 22 20.99 19.94 20.99 16.48V8.52C21 5.06 18.93 3 15.48 3Z" fill="#0073ff"></path> <path d="M21.0195 2.97979C19.2295 1.17979 17.4795 1.13979 15.6395 2.97979L14.5095 4.09979C14.4095 4.19979 14.3795 4.33979 14.4195 4.46979C15.1195 6.91979 17.0795 8.87979 19.5295 9.57979C19.5595 9.58979 19.6095 9.58979 19.6395 9.58979C19.7395 9.58979 19.8395 9.54979 19.9095 9.47979L21.0195 8.35979C21.9295 7.44979 22.3795 6.57979 22.3795 5.68979C22.3795 4.78979 21.9295 3.89979 21.0195 2.97979Z" fill="#0073ff"></path> <path d="M17.8591 10.4198C17.5891 10.2898 17.3291 10.1598 17.0891 10.0098C16.8891 9.88984 16.6891 9.75984 16.4991 9.61984C16.3391 9.51984 16.1591 9.36984 15.9791 9.21984C15.9591 9.20984 15.8991 9.15984 15.8191 9.07984C15.5091 8.82984 15.1791 8.48984 14.8691 8.11984C14.8491 8.09984 14.7891 8.03984 14.7391 7.94984C14.6391 7.83984 14.4891 7.64984 14.3591 7.43984C14.2491 7.29984 14.1191 7.09984 13.9991 6.88984C13.8491 6.63984 13.7191 6.38984 13.5991 6.12984C13.4691 5.84984 13.3691 5.58984 13.2791 5.33984L7.89912 10.7198C7.54912 11.0698 7.20912 11.7298 7.13912 12.2198L6.70912 15.1998C6.61912 15.8298 6.78912 16.4198 7.17912 16.8098C7.50912 17.1398 7.95912 17.3098 8.45912 17.3098C8.56912 17.3098 8.67912 17.2998 8.78912 17.2898L11.7591 16.8698C12.2491 16.7998 12.9091 16.4698 13.2591 16.1098L18.6391 10.7298C18.3891 10.6498 18.1391 10.5398 17.8591 10.4198Z" fill="#0073ff"></path> </g></svg>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="mx-1 multi-collapse-{{ $awd->id }} rounded-lg shadow-lg"
                                    data-te-collapse-item
                                    data-te-class-collapsingHorizontal
                                    id="hide-{{ $awd->id }}">
                                    <div
                                        class="rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                                        <!-- TODO: Add api point -->
                                        <delete-item event-bus-name="eventBusProjectEdit" 
                                            projectid="{{ $awd->id }}" 
                                            apipoint="{{ route('api.dashboard.award.delete', [ 'id' => $awd->id ])}}" 
                                            itemname="project" 
                                            scopeselector="[data-ui='awards-list-main']" 
                                            toincludeidentifier="[data-ui='awards-list-item-tr-award-{{ $awd->id }}']" />
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
    <!-- Awards table END -->

</main>
@endsection