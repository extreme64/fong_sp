@extends('layouts.dash-page')

@section('title', 'Project Dashboard')

@section('description', 'Edit contetn and projects')


@section('main')
<main data-ui="main-project" class="w-full">

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
                href="{{ route('dashboard.projects.list') }}"
                class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
                >Projects</a
            >
            </li>
            <li>
                <span class="mx-2 text-neutral-500 dark:text-neutral-300">/</span>
            </li>
            <li class="text-neutral-500 dark:text-neutral-300">{{$project->title}}</li>
        </ol>
    </nav>
    <!-- Bread END -->

    <h2 class="mt-9 mb-5 font-bold">
        <div class="flex col-gap-1 items-center">
            <!-- {{$project->title}}  -->
            <input type="text" name="title" id="title" projectData value="{{$project->title}}">

            @if($project->id)
            <submit-changes 
                apiAction="PATCH"
                apiPoint="{{ route('project.update', ['project'=>$project->id ]) }}" event-bus-name="eventBusProjectEdit" 
                itemClass="project" itemId="{{ $project->id }}" 
                scopeselector="[data-ui='main-project']" 
                toincludeidentifier="[projectData]" />
            @else
            <submit-changes 
                apiAction="POST"
                apiPoint="{{ route('project.store') }}" 
                event-bus-name="eventBusProjectEdit" 
                itemClass="project" itemId="{{ $project->id }}" 
                scopeselector="[data-ui='main-project']" 
                toincludeidentifier="[projectData]" />
            @endif

        </div>
    </h2>
    
    <!-- Projects table -->
     <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full">
                <div class="overflow-hidden">
                    <table 
                        class="flex flex-col min-w-full text-left text-sm font-light">
                        <thead 
                            class="border-b font-medium dark:border-neutral-500">
                            <tr class="flex">
                                <th scope="col" class="flex-none w-[1/4] px-2 py-4">ID</th>
                                <th scope="col" class="flex-1 px-2 py-4">Title</th>
                                <th scope="col" class="flex-none w-[1/4] px-2 py-4">Awards</th>
                                <th scope="col" class="flex-none w-[1/4] px-2 py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="flex flex-col">
                            <tr class="flex justify-between border-b dark:border-neutral-500">
                                <td class="flex-none w-[1/4] px-2 py-4 font-medium">{{ $project->id }}</td>
                                <td class="flex-1 px-2 py-4">{{ $project->title }}</td>
                                <td class="flex-none w-[1/4] px-2 py-4">{{ $awardsCount }}</td>
                                <td class="flex-none w-[1/4] px-2 py-4">
                                    <?php
                                    // TODO: Make a status aka eye, component.
                                    if((int)$project->status === 1): ?>
                                        <svg width="32px" height="32px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M21.25 9.14993C18.94 5.51993 15.56 3.42993 12 3.42993C10.22 3.42993 8.49 3.94993 6.91 4.91993C5.33 5.89993 3.91 7.32993 2.75 9.14993C1.75 10.7199 1.75 13.2699 2.75 14.8399C5.06 18.4799 8.44 20.5599 12 20.5599C13.78 20.5599 15.51 20.0399 17.09 19.0699C18.67 18.0899 20.09 16.6599 21.25 14.8399C22.25 13.2799 22.25 10.7199 21.25 9.14993ZM12 16.0399C9.76 16.0399 7.96 14.2299 7.96 11.9999C7.96 9.76993 9.76 7.95993 12 7.95993C14.24 7.95993 16.04 9.76993 16.04 11.9999C16.04 14.2299 14.24 16.0399 12 16.0399Z" fill="#0073ff"></path> <path d="M12.0004 9.13989C10.4304 9.13989 9.15039 10.4199 9.15039 11.9999C9.15039 13.5699 10.4304 14.8499 12.0004 14.8499C13.5704 14.8499 14.8604 13.5699 14.8604 11.9999C14.8604 10.4299 13.5704 9.13989 12.0004 9.13989Z" fill="#0073ff"></path> </g></svg>
                                    <?php else: ?>
                                        <svg width="32px" height="32px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M21.2496 9.15004C20.7596 8.37004 20.1996 7.67004 19.6196 7.04004L15.8496 10.81C15.9696 11.18 16.0396 11.58 16.0396 12C16.0396 14.24 14.2296 16.04 11.9996 16.04C11.5796 16.04 11.1796 15.97 10.8096 15.85L7.34961 19.31C8.80961 20.13 10.3896 20.56 11.9996 20.56C13.7796 20.56 15.5096 20.04 17.0896 19.07C18.6696 18.09 20.0896 16.66 21.2496 14.84C22.2496 13.28 22.2496 10.72 21.2496 9.15004Z" fill="#292D32"></path> <path d="M14.0206 9.97989L9.98062 14.0199C9.47062 13.4999 9.14062 12.7799 9.14062 11.9999C9.14062 10.4299 10.4206 9.13989 12.0006 9.13989C12.7806 9.13989 13.5006 9.46989 14.0206 9.97989Z" fill="#292D32"></path> <path opacity="0.4" d="M18.25 5.74993L14.86 9.13993C14.13 8.39993 13.12 7.95993 12 7.95993C9.76 7.95993 7.96 9.76993 7.96 11.9999C7.96 13.1199 8.41 14.1299 9.14 14.8599L5.76 18.2499H5.75C4.64 17.3499 3.62 16.1999 2.75 14.8399C1.75 13.2699 1.75 10.7199 2.75 9.14993C3.91 7.32993 5.33 5.89993 6.91 4.91993C8.49 3.95993 10.22 3.42993 12 3.42993C14.23 3.42993 16.39 4.24993 18.25 5.74993Z" fill="#292D32"></path> <path d="M14.8601 12.0001C14.8601 13.5701 13.5801 14.8601 12.0001 14.8601C11.9401 14.8601 11.8901 14.8601 11.8301 14.8401L14.8401 11.8301C14.8601 11.8901 14.8601 11.9401 14.8601 12.0001Z" fill="#292D32"></path> <path d="M21.7709 2.22988C21.4709 1.92988 20.9809 1.92988 20.6809 2.22988L2.23086 20.6899C1.93086 20.9899 1.93086 21.4799 2.23086 21.7799C2.38086 21.9199 2.57086 21.9999 2.77086 21.9999C2.97086 21.9999 3.16086 21.9199 3.31086 21.7699L21.7709 3.30988C22.0809 3.00988 22.0809 2.52988 21.7709 2.22988Z" fill="#292D32"></path> </g></svg>
                                    <?php endif ?>
                                </td>
                            </tr>                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects table END -->


    <div class="flex flex-col md:flex-row my-8">
        <section class="w-1/1 md:w-3/4">

            <!-- Main content -->
            <h3>Content</h3>
            <div class="relative mb-3" data-te-input-wrapper-init>
                <textarea
                    class="text-sm leading-normal peer block min-h-[30rem] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="mainContent"
                    name="mainContent"
                    projectData
                    rows="3"
                    placeholder="Project main text">{{ $project->body }}</textarea>
                <label
                    for="mainContent"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                    >Markdown</label>
            </div>
            <!-- Main content END -->

            <!-- Awards table -->
            <h3>Project's Awards</h3>
            
            <div class="flex flex-col">
                <div class="overflow-x-auto ">
                    <div class="inline-block min-w-full ">
                        <div class="overflow-hidden">
                            <table
                                data-ui="projects-list-main" 
                                class="flex flex-col min-w-full text-left text-sm font-light bg-white">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr class="flex">
                                        <th scope="col" class="flex-none w-[1/5] px-2 py-4">ID</th>
                                        <th scope="col" class="flex-1 px-2 py-4">Title</th>
                                        <th scope="col" class="flex-none w-[1/5] px-2 py-4">Awards</th>
                                        <th scope="col" class="flex-none w-[1/5] px-2 py-4">Status</th>
                                        <th scope="col" class="flex-none w-[1/5] px-2 py-4">Goto/Edit</th>
                                    </tr>
                                </thead> 
                                <tbody class="flex flex-col">
                                    @foreach($awards as $award)
                                    <tr class="flex justify-between border-b dark:border-neutral-500">
                                        <td class="flex-none w-[1/5] px-2 py-4 font-xs">{{ $award->id }}</td>
                                        <td class="flex-1 px-2 py-4 overflow-hidden text-ellipsis">
                                            <div class="flex">
                                                <img class="h-6 w-6 mx-2 rounded-md" laoding="lazy" src="{{ asset('images/'.$award->full_name ) }}" alt="award feature image">{{ $award->title }}
                                            </div>
                                        </td>
                                        <td class="flex-none w-[1/5] px-2 py-4 text-xs">{{ $award->type }}</td>
                                        <td class="flex-none w-[1/5] px-2 py-4">
                                            <?php
                                            if((int)$award->status === 1): ?>
                                                <svg width="32px" height="32px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M21.25 9.14993C18.94 5.51993 15.56 3.42993 12 3.42993C10.22 3.42993 8.49 3.94993 6.91 4.91993C5.33 5.89993 3.91 7.32993 2.75 9.14993C1.75 10.7199 1.75 13.2699 2.75 14.8399C5.06 18.4799 8.44 20.5599 12 20.5599C13.78 20.5599 15.51 20.0399 17.09 19.0699C18.67 18.0899 20.09 16.6599 21.25 14.8399C22.25 13.2799 22.25 10.7199 21.25 9.14993ZM12 16.0399C9.76 16.0399 7.96 14.2299 7.96 11.9999C7.96 9.76993 9.76 7.95993 12 7.95993C14.24 7.95993 16.04 9.76993 16.04 11.9999C16.04 14.2299 14.24 16.0399 12 16.0399Z" fill="#0073ff"></path> <path d="M12.0004 9.13989C10.4304 9.13989 9.15039 10.4199 9.15039 11.9999C9.15039 13.5699 10.4304 14.8499 12.0004 14.8499C13.5704 14.8499 14.8604 13.5699 14.8604 11.9999C14.8604 10.4299 13.5704 9.13989 12.0004 9.13989Z" fill="#0073ff"></path> </g></svg>
                                            <?php else: ?>
                                                <svg width="32px" height="32px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M21.2496 9.15004C20.7596 8.37004 20.1996 7.67004 19.6196 7.04004L15.8496 10.81C15.9696 11.18 16.0396 11.58 16.0396 12C16.0396 14.24 14.2296 16.04 11.9996 16.04C11.5796 16.04 11.1796 15.97 10.8096 15.85L7.34961 19.31C8.80961 20.13 10.3896 20.56 11.9996 20.56C13.7796 20.56 15.5096 20.04 17.0896 19.07C18.6696 18.09 20.0896 16.66 21.2496 14.84C22.2496 13.28 22.2496 10.72 21.2496 9.15004Z" fill="#292D32"></path> <path d="M14.0206 9.97989L9.98062 14.0199C9.47062 13.4999 9.14062 12.7799 9.14062 11.9999C9.14062 10.4299 10.4206 9.13989 12.0006 9.13989C12.7806 9.13989 13.5006 9.46989 14.0206 9.97989Z" fill="#292D32"></path> <path opacity="0.4" d="M18.25 5.74993L14.86 9.13993C14.13 8.39993 13.12 7.95993 12 7.95993C9.76 7.95993 7.96 9.76993 7.96 11.9999C7.96 13.1199 8.41 14.1299 9.14 14.8599L5.76 18.2499H5.75C4.64 17.3499 3.62 16.1999 2.75 14.8399C1.75 13.2699 1.75 10.7199 2.75 9.14993C3.91 7.32993 5.33 5.89993 6.91 4.91993C8.49 3.95993 10.22 3.42993 12 3.42993C14.23 3.42993 16.39 4.24993 18.25 5.74993Z" fill="#292D32"></path> <path d="M14.8601 12.0001C14.8601 13.5701 13.5801 14.8601 12.0001 14.8601C11.9401 14.8601 11.8901 14.8601 11.8301 14.8401L14.8401 11.8301C14.8601 11.8901 14.8601 11.9401 14.8601 12.0001Z" fill="#292D32"></path> <path d="M21.7709 2.22988C21.4709 1.92988 20.9809 1.92988 20.6809 2.22988L2.23086 20.6899C1.93086 20.9899 1.93086 21.4799 2.23086 21.7799C2.38086 21.9199 2.57086 21.9999 2.77086 21.9999C2.97086 21.9999 3.16086 21.9199 3.31086 21.7699L21.7709 3.30988C22.0809 3.00988 22.0809 2.52988 21.7709 2.22988Z" fill="#292D32"></path> </g></svg>
                                            <?php endif ?>
                                        </td>
                                        <td class="flex-none w-[1/5] px-2 py-4">
                                            <div class="flex">
                                                <a href="{{ route('dashboard.awards.edit', ['id'=>$award->id]) }}">
                                                    <svg width="24px" height="24px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M15.48 3H7.52C4.07 3 2 5.06 2 8.52V16.47C2 19.94 4.07 22 7.52 22H15.47C18.93 22 20.99 19.94 20.99 16.48V8.52C21 5.06 18.93 3 15.48 3Z" fill="#0073ff"></path> <path d="M21.0195 2.97979C19.2295 1.17979 17.4795 1.13979 15.6395 2.97979L14.5095 4.09979C14.4095 4.19979 14.3795 4.33979 14.4195 4.46979C15.1195 6.91979 17.0795 8.87979 19.5295 9.57979C19.5595 9.58979 19.6095 9.58979 19.6395 9.58979C19.7395 9.58979 19.8395 9.54979 19.9095 9.47979L21.0195 8.35979C21.9295 7.44979 22.3795 6.57979 22.3795 5.68979C22.3795 4.78979 21.9295 3.89979 21.0195 2.97979Z" fill="#0073ff"></path> <path d="M17.8591 10.4198C17.5891 10.2898 17.3291 10.1598 17.0891 10.0098C16.8891 9.88984 16.6891 9.75984 16.4991 9.61984C16.3391 9.51984 16.1591 9.36984 15.9791 9.21984C15.9591 9.20984 15.8991 9.15984 15.8191 9.07984C15.5091 8.82984 15.1791 8.48984 14.8691 8.11984C14.8491 8.09984 14.7891 8.03984 14.7391 7.94984C14.6391 7.83984 14.4891 7.64984 14.3591 7.43984C14.2491 7.29984 14.1191 7.09984 13.9991 6.88984C13.8491 6.63984 13.7191 6.38984 13.5991 6.12984C13.4691 5.84984 13.3691 5.58984 13.2791 5.33984L7.89912 10.7198C7.54912 11.0698 7.20912 11.7298 7.13912 12.2198L6.70912 15.1998C6.61912 15.8298 6.78912 16.4198 7.17912 16.8098C7.50912 17.1398 7.95912 17.3098 8.45912 17.3098C8.56912 17.3098 8.67912 17.2998 8.78912 17.2898L11.7591 16.8698C12.2491 16.7998 12.9091 16.4698 13.2591 16.1098L18.6391 10.7298C18.3891 10.6498 18.1391 10.5398 17.8591 10.4198Z" fill="#0073ff"></path> </g></svg>
                                                </a>
                                                <!-- 
                                                    <svg width="24px" height="24px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.0697 5.23C19.4597 5.07 17.8497 4.95 16.2297 4.86V4.85L16.0097 3.55C15.8597 2.63 15.6397 1.25 13.2997 1.25H10.6797C8.34967 1.25 8.12967 2.57 7.96967 3.54L7.75967 4.82C6.82967 4.88 5.89967 4.94 4.96967 5.03L2.92967 5.23C2.50967 5.27 2.20967 5.64 2.24967 6.05C2.28967 6.46 2.64967 6.76 3.06967 6.72L5.10967 6.52C10.3497 6 15.6297 6.2 20.9297 6.73C20.9597 6.73 20.9797 6.73 21.0097 6.73C21.3897 6.73 21.7197 6.44 21.7597 6.05C21.7897 5.64 21.4897 5.27 21.0697 5.23Z" fill="#0073ff"></path> <path opacity="0.3991" d="M19.2297 8.14C18.9897 7.89 18.6597 7.75 18.3197 7.75H5.67975C5.33975 7.75 4.99975 7.89 4.76975 8.14C4.53975 8.39 4.40975 8.73 4.42975 9.08L5.04975 19.34C5.15975 20.86 5.29975 22.76 8.78975 22.76H15.2097C18.6997 22.76 18.8398 20.87 18.9497 19.34L19.5697 9.09C19.5897 8.73 19.4597 8.39 19.2297 8.14Z" fill="#0073ff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.58008 17C9.58008 16.5858 9.91586 16.25 10.3301 16.25H13.6601C14.0743 16.25 14.4101 16.5858 14.4101 17C14.4101 17.4142 14.0743 17.75 13.6601 17.75H10.3301C9.91586 17.75 9.58008 17.4142 9.58008 17Z" fill="#0073ff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75 13C8.75 12.5858 9.08579 12.25 9.5 12.25H14.5C14.9142 12.25 15.25 12.5858 15.25 13C15.25 13.4142 14.9142 13.75 14.5 13.75H9.5C9.08579 13.75 8.75 13.4142 8.75 13Z" fill="#0073ff"></path> </g></svg>
                                                </a> -->
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

        </section>

        
        <aside class="w-1/1 md:w-1/4 px-4">

            <!-- Description -->
            <h3>Description</h3>
            <div class="relative mb-3" data-te-input-wrapper-init>
            <textarea
                class="text-xs leading-[16px] peer block min-h-[14rem] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="description"
                name="description"
                projectData
                rows="3"
                placeholder="Short info...">{{ $project->description }}</textarea>
            <label
                for="description"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                >Project breaf</label
            >
            </div>
            <!-- Description END -->

            <!-- Settings -->
            <h3>Settings</h3>
            <div class="rounded-md border p-1">

                <!--Permalink -->
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input
                        type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.33rem] text-xs leading-[1.5] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="permalink"
                        name="permalink"
                        projectData
                        placeholder="Form control sm"
                        value="{{ $project->permalink }}"/>
                    <label
                        for="permalink"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] text-xs leading-[1.5] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.75rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.75rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                        >Permalink
                    </label>
                </div>
    
                <!-- Is public -->
                <input
                    class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca]"
                    type="checkbox"
                    role="switch"
                    projectData
                    id="isPublic" 
                    <?= ( (int)$project->status === 1) ? "checked='true'" : ""; ?> 
                    name="isPublic" />
                    <label
                    class="inline-block pl-[0.15rem] hover:cursor-pointer"
                    for="isPublic"
                    >Is public</label
                >
                <script>
                    const checkbox = document.getElementById("isPublic");

                    checkbox.addEventListener("change", function () {
                        if (checkbox.checked) {
                            // Checkbox is checked, do something when it's on
                            console.log("Checkbox is ON");
                        } else {
                            // Checkbox is not checked, do something when it's off
                            console.log("Checkbox is OFF");
                        }
                    });
                </script>
            </div>
            <!-- Settings End -->
        </aside>
    </div>



</main>
@endsection