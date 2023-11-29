@extends('layouts.project')

@section('title', 'Edit Award : ' . $award->title)

@section('description', 'Edit award info')


@section('main')
<main data-ui="main-award" class="w-full">

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
                href="{{ route('dashboard-awards.index') }}"
                class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
                >Awards</a
            >
            </li>
            <li>
                <span class="mx-2 text-neutral-500 dark:text-neutral-300">/</span>
            </li>
            <li class="text-neutral-500 dark:text-neutral-300">{{ $award->title }}</li>
        </ol>
    </nav>
    <!-- Bread END -->

    <h2 class="mt-9 mb-5 font-bold">
        <div class="flex col-gap-1 items-center">
            <!-- {{$award->title}}  -->
            <input type="text" name="title" id="title" awardData value="{{$award->title}}">

            @if($award->id)
            <submit-changes 
                apiAction="PATCH"
                apiPoint="{{ route('api.dashboard.award.update', ['id'=>$award->id]) }}" 
                event-bus-name="eventBusProjectEdit" itemClass="award" itemId="{{ $award->id }}" 
                projectid="{{ $award->project_id }}" 
                scopeselector="[data-ui='main-award']" 
                toincludeidentifier="[awardData]" />
            @else
            <submit-changes 
                apiAction="POST"
                apiPoint="{{ route('api.dashboard.award.create') }}" 
                event-bus-name="eventBusProjectEdit" itemClass="award" itemId="{{ $award->id }}" 
                projectid="{{ $award->project_id }}" 
                scopeselector="[data-ui='main-award']" 
                toincludeidentifier="[awardData]" />
            @endif
        </div>
    </h2>
    
    

    <!-- Award table -->
    <div class="flex flex-col">
        <div class="overflow-x-auto ">
            <div class="inline-block min-w-full ">
                <div class="overflow-hidden">
                    <table  class="flex flex-col min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr class="flex">
                                <th scope="col" class="flex-none w-[80px] px-2 py-4">ID</th>
                                <th scope="col" class="flex-none w-[80px] px-2 py-4">Projects</th>
                                <th scope="col" class="flex-none w-[80px] px-2 py-4">Products</th>
                                <th scope="col" class="flex-1 px-2 py-4">Title</th>
                                <th scope="col" class="flex-none w-[120px] px-2 py-4">Type</th>
                                <th scope="col" class="flex-none w-[80px] px-2 py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="flex flex-col">
                            <tr class="flex justify-between  border-b dark:border-neutral-500">
                                <td class="flex-none w-[80px] px-2 py-4 font-medium">{{ $award->id }}</td>
                                <td class="flex-none w-[80px] px-2 py-4">{{ $award->project_id }}</td>
                                <td class="flex-none w-[80px] px-2 py-4">{{ $award->product_id }}</td>
                                <td class="flex-1 px-2 p-4">{{ $award->title }}</td>
                                <td class="flex-none w-[120px] px-2 py-4 overflow-hidden text-ellipsis">{{ $award->type }}</td>
                                <td class="flex-none w-[80px] px-2 py-4">
                                    <?php
                                    // TODO: Make a status aka eye, component.
                                    if((int)$award->status === 1): ?>
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
    <!-- Award table END -->

   

    <div class="flex flex-col md:flex-row my-8">
        <section class="w-1/1 md:w-3/4">

            <!-- Main content -->
            <input awardData type="hidden" name="projectId" value="{{ $award->project_id }}"/>
            <input awardData type="hidden" name="productId" value="{{ $award->product_id }}"/>
            <input awardData type="hidden" name="type" value="{{ $award->type }}"/>
            <h3>Image</h3>


            <!-- Projects table -->
            <h3 class="mt-9 mb-5 font-bold">PROJECTS</h3>
            <h4 class="mt-9 mb-5 font-bold">Asign awards to projects</h4>
            
            <div class="flex flex-col">
                <div class="overflow-x-auto ">
                    <div class="inline-block min-w-full ">
                        <div class="overflow-hidden">
                            <table 
                                data-ui="projects-list-main" 
                                class="flex flex-col min-w-full text-left text-sm font-light bg-white">
                                <!-- <thead class="flex flex-row justify-between border-b font-medium dark:border-neutral-500"> -->
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr class="flex">
                                        <th class="flex-none w-[50px] px-2 py-4">ID</th>
                                        <th class="flex-1 px-2 py-4">Title</th>
                                        <th class="flex-none w-[80px] px-2 py-4">Status</th>
                                        <th class="flex-none w-[130px] px-2 py-4">Added To</th>
                                    </tr>
                                </thead>
                                <tbody class="flex flex-col">

                                    @foreach($projects as $prj)
                                    <tr 
                                        data-ui="projects-list-item-tr-project-{{ $prj->id }}" 
                                        class="flex justify-between border-b dark:border-neutral-500">
                                        <td class="flex-none w-[50px] px-2 py-4 font-medium">{{ $prj->id }}</td>
                                        <td class="flex-1 px-2 py-4">{{ $prj->title }}</td>
                                        <td class="flex-none w-[80px] px-2 py-4">
                                        <?php
                                            if((int)$prj->status === 1): ?>
                                                <svg class="mx-auto" width="32px" height="32px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M21.25 9.14993C18.94 5.51993 15.56 3.42993 12 3.42993C10.22 3.42993 8.49 3.94993 6.91 4.91993C5.33 5.89993 3.91 7.32993 2.75 9.14993C1.75 10.7199 1.75 13.2699 2.75 14.8399C5.06 18.4799 8.44 20.5599 12 20.5599C13.78 20.5599 15.51 20.0399 17.09 19.0699C18.67 18.0899 20.09 16.6599 21.25 14.8399C22.25 13.2799 22.25 10.7199 21.25 9.14993ZM12 16.0399C9.76 16.0399 7.96 14.2299 7.96 11.9999C7.96 9.76993 9.76 7.95993 12 7.95993C14.24 7.95993 16.04 9.76993 16.04 11.9999C16.04 14.2299 14.24 16.0399 12 16.0399Z" fill="#0073ff"></path> <path d="M12.0004 9.13989C10.4304 9.13989 9.15039 10.4199 9.15039 11.9999C9.15039 13.5699 10.4304 14.8499 12.0004 14.8499C13.5704 14.8499 14.8604 13.5699 14.8604 11.9999C14.8604 10.4299 13.5704 9.13989 12.0004 9.13989Z" fill="#0073ff"></path> </g></svg>
                                            <?php else: ?>
                                                <svg class="mx-auto" width="32px" height="32px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M21.2496 9.15004C20.7596 8.37004 20.1996 7.67004 19.6196 7.04004L15.8496 10.81C15.9696 11.18 16.0396 11.58 16.0396 12C16.0396 14.24 14.2296 16.04 11.9996 16.04C11.5796 16.04 11.1796 15.97 10.8096 15.85L7.34961 19.31C8.80961 20.13 10.3896 20.56 11.9996 20.56C13.7796 20.56 15.5096 20.04 17.0896 19.07C18.6696 18.09 20.0896 16.66 21.2496 14.84C22.2496 13.28 22.2496 10.72 21.2496 9.15004Z" fill="#292D32"></path> <path d="M14.0206 9.97989L9.98062 14.0199C9.47062 13.4999 9.14062 12.7799 9.14062 11.9999C9.14062 10.4299 10.4206 9.13989 12.0006 9.13989C12.7806 9.13989 13.5006 9.46989 14.0206 9.97989Z" fill="#292D32"></path> <path opacity="0.4" d="M18.25 5.74993L14.86 9.13993C14.13 8.39993 13.12 7.95993 12 7.95993C9.76 7.95993 7.96 9.76993 7.96 11.9999C7.96 13.1199 8.41 14.1299 9.14 14.8599L5.76 18.2499H5.75C4.64 17.3499 3.62 16.1999 2.75 14.8399C1.75 13.2699 1.75 10.7199 2.75 9.14993C3.91 7.32993 5.33 5.89993 6.91 4.91993C8.49 3.95993 10.22 3.42993 12 3.42993C14.23 3.42993 16.39 4.24993 18.25 5.74993Z" fill="#292D32"></path> <path d="M14.8601 12.0001C14.8601 13.5701 13.5801 14.8601 12.0001 14.8601C11.9401 14.8601 11.8901 14.8601 11.8301 14.8401L14.8401 11.8301C14.8601 11.8901 14.8601 11.9401 14.8601 12.0001Z" fill="#292D32"></path> <path d="M21.7709 2.22988C21.4709 1.92988 20.9809 1.92988 20.6809 2.22988L2.23086 20.6899C1.93086 20.9899 1.93086 21.4799 2.23086 21.7799C2.38086 21.9199 2.57086 21.9999 2.77086 21.9999C2.97086 21.9999 3.16086 21.9199 3.31086 21.7699L21.7709 3.30988C22.0809 3.00988 22.0809 2.52988 21.7709 2.22988Z" fill="#292D32"></path> </g></svg>
                                        <?php 
                                        endif ?>
                                        </td>
                                        <td class="flex-none w-[130px] px-2 px-6 py-4">

                                            <div
                                            class="mx-1 multi-collapse-{{ $prj->id }}"
                                            data-te-class-collapsingHorizontal
                                            data-te-collapse-item
                                            id="edit-{{$prj->id}}">
                                                <!-- Activ In Project -->

                                                <input
                                                    class="relative float-left mx-auto mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                                    awardData 
                                                    value="{{ $prj->id }}"
                                                    name="projectId" 
                                                    id="project{{ $prj->id }}" 
                                                    type="radio"
                                                    {{ $prj->isChecked }}
                                                />
                                                <label
                                                    class="mt-px inline-block pl-[0.15rem] hover:cursor-po
                                                    inter"
                                                    for="project{{ $prj->id }}">
                                                </label>
                                                
                                        
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
            <!-- Projects table END -->

            <!-- Files gallery -->
            <h3 class="mt-9 mb-5 font-bold">FILES</h3>
            <h4 class="mt-9 mb-5 font-bold">Select </h4>
            <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                <div class=" flex flex-wrap md:-m-2">
                
                @foreach($files as $fl)
                    <div class="flex flex-col w-1/6 m-1 p-1 rounded-lg shadow-md dark:bg-gray-900 dark:text-gray-100">
                        <div class="flex space-x-4">
                            <!-- <div class="object-cover w-6 h-6 rounded-full shadow dark:bg-gray-500">
                                
                            </div> -->
                            <div class="flex flex-col justify-center">
                                <span class="text-xs dark:text-gray-400">
                                    <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                        <input
                                            class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                            awardData 
                                            value="{{ $fl->id }}"
                                            name="mediaId" 
                                            id="media{{ $fl->id }}" 
                                            type="radio" 
                                            {{ $fl->isChecked }}
                                            />
                                        <label
                                            class="mt-px inline-block pl-[0.15rem] hover:cursor-po
                                            inter"
                                            for="media{{ $fl->id }}">
                                                <svg width="32px" height="32px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#0073ff" stroke-width="0.24000000000000005"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M22.0206 16.8198L18.8906 9.49978C18.3206 8.15978 17.4706 7.39978 16.5006 7.34978C15.5406 7.29978 14.6106 7.96978 13.9006 9.24978L12.0006 12.6598C11.6006 13.3798 11.0306 13.8098 10.4106 13.8598C9.78063 13.9198 9.15063 13.5898 8.64063 12.9398L8.42063 12.6598C7.71063 11.7698 6.83063 11.3398 5.93063 11.4298C5.03063 11.5198 4.26063 12.1398 3.75063 13.1498L2.02063 16.5998C1.40063 17.8498 1.46063 19.2998 2.19063 20.4798C2.92063 21.6598 4.19063 22.3698 5.58063 22.3698H18.3406C19.6806 22.3698 20.9306 21.6998 21.6706 20.5798C22.4306 19.4598 22.5506 18.0498 22.0206 16.8198Z" fill="#777777"></path> <path d="M6.96984 8.38012C8.83657 8.38012 10.3498 6.86684 10.3498 5.00012C10.3498 3.13339 8.83657 1.62012 6.96984 1.62012C5.10312 1.62012 3.58984 3.13339 3.58984 5.00012C3.58984 6.86684 5.10312 8.38012 6.96984 8.38012Z" fill="#777777"></path> </g></svg>
                                        </label>
                                    </div>

                                </span>
                            </div>
                        </div>
                        <div>
                            
                            <img 
                                src="{{ asset('storage/images/' . $fl->full_name ) }}" 
                                alt="" 
                                class="object-cover mb-2 w-full aspect-square flex-wrap dark:bg-gray-500"
                            >
                            
                            <div class="flex text-xs dark:text-gray-400">
                                <svg width="24px" height="24px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M20.1004 6.93998C20.1004 7.47998 19.8104 7.96995 19.3504 8.21995L17.6104 9.15995L16.1304 9.94999L13.0604 11.61C12.7304 11.79 12.3704 11.88 12.0004 11.88C11.6304 11.88 11.2704 11.79 10.9404 11.61L4.65039 8.21995C4.19039 7.96995 3.90039 7.47998 3.90039 6.93998C3.90039 6.39998 4.19039 5.90995 4.65039 5.65995L6.62039 4.59996L8.1904 3.74998L10.9404 2.27C11.6004 1.91 12.4004 1.91 13.0604 2.27L19.3504 5.65995C19.8104 5.90995 20.1004 6.39998 20.1004 6.93998Z" fill="#777777"></path> <path opacity="0.4" d="M9.9007 12.7899L4.05069 9.85989C3.60069 9.62989 3.0807 9.65989 2.6507 9.91989C2.2207 10.1799 1.9707 10.6399 1.9707 11.1399V16.6699C1.9707 17.6299 2.50069 18.4899 3.36069 18.9199L9.21069 21.8399C9.41069 21.9399 9.63071 21.9899 9.85071 21.9899C10.1107 21.9899 10.3707 21.9199 10.6007 21.7699C11.0307 21.5099 11.2807 21.0499 11.2807 20.5499V15.0199C11.2907 14.0799 10.7607 13.2199 9.9007 12.7899Z" fill="#777777"></path> <path opacity="0.4" d="M22.0309 11.1502V16.6801C22.0309 17.6301 21.501 18.4901 20.641 18.9201L14.791 21.8501C14.591 21.9501 14.3709 22.0001 14.1509 22.0001C13.8909 22.0001 13.631 21.9302 13.391 21.7802C12.971 21.5202 12.7109 21.0601 12.7109 20.5601V15.0401C12.7109 14.0801 13.241 13.2201 14.101 12.7901L16.2509 11.7201L17.7509 10.9701L19.951 9.87013C20.401 9.64013 20.921 9.66012 21.351 9.93012C21.771 10.1901 22.0309 10.6502 22.0309 11.1502Z" fill="#777777"></path> <path d="M17.6091 9.15997L16.1292 9.95001L6.61914 4.59998L8.18915 3.75L17.3691 8.92999C17.4691 8.98999 17.5491 9.06997 17.6091 9.15997Z" fill="#777777"></path> <path d="M17.75 10.97V13.24C17.75 13.65 17.41 13.99 17 13.99C16.59 13.99 16.25 13.65 16.25 13.24V11.72L17.75 10.97Z" fill="#777777"></path> </g>
                                </svg>{{ $fl->memeType }}
                            </div>
                            <div class="flex text-xs dark:text-gray-400">
                                <svg width="24px" height="24px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M21 22.75H3C2.59 22.75 2.25 22.41 2.25 22C2.25 21.59 2.59 21.25 3 21.25H21C21.41 21.25 21.75 21.59 21.75 22C21.75 22.41 21.41 22.75 21 22.75Z" fill="#777777"></path> <path d="M5.59998 8.37988H4C3.45 8.37988 3 8.82988 3 9.37988V17.9999C3 18.5499 3.45 18.9999 4 18.9999H5.59998C6.14998 18.9999 6.59998 18.5499 6.59998 17.9999V9.37988C6.59998 8.81988 6.14998 8.37988 5.59998 8.37988Z" fill="#777777"></path> <path d="M12.7992 5.18994H11.1992C10.6492 5.18994 10.1992 5.63994 10.1992 6.18994V17.9999C10.1992 18.5499 10.6492 18.9999 11.1992 18.9999H12.7992C13.3492 18.9999 13.7992 18.5499 13.7992 17.9999V6.18994C13.7992 5.63994 13.3492 5.18994 12.7992 5.18994Z" fill="#777777"></path> <path d="M20.0004 2H18.4004C17.8504 2 17.4004 2.45 17.4004 3V18C17.4004 18.55 17.8504 19 18.4004 19H20.0004C20.5504 19 21.0004 18.55 21.0004 18V3C21.0004 2.45 20.5504 2 20.0004 2Z" fill="#777777"></path></g>
                                </svg>135kb
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-between">
                           
                             <div class="flex">
                                <div class="flex">
                                    <div
                                    class="mx-1 multi-collapse-{{ $fl->id }} rounded-lg shadow-lg"
                                    data-te-class-collapsingHorizontal
                                    data-te-collapse-item
                                    id="edit-{{ $fl->id }}"
                                    >
                                    <div
                                        class="rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                                        <a href="{{ route('medias.dashboard-file.edit', ['id'=>$fl->id]) }}">
                                            <svg width="24px" height="24px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M15.48 3H7.52C4.07 3 2 5.06 2 8.52V16.47C2 19.94 4.07 22 7.52 22H15.47C18.93 22 20.99 19.94 20.99 16.48V8.52C21 5.06 18.93 3 15.48 3Z" fill="#0073ff"></path> <path d="M21.0195 2.97979C19.2295 1.17979 17.4795 1.13979 15.6395 2.97979L14.5095 4.09979C14.4095 4.19979 14.3795 4.33979 14.4195 4.46979C15.1195 6.91979 17.0795 8.87979 19.5295 9.57979C19.5595 9.58979 19.6095 9.58979 19.6395 9.58979C19.7395 9.58979 19.8395 9.54979 19.9095 9.47979L21.0195 8.35979C21.9295 7.44979 22.3795 6.57979 22.3795 5.68979C22.3795 4.78979 21.9295 3.89979 21.0195 2.97979Z" fill="#0073ff"></path> <path d="M17.8591 10.4198C17.5891 10.2898 17.3291 10.1598 17.0891 10.0098C16.8891 9.88984 16.6891 9.75984 16.4991 9.61984C16.3391 9.51984 16.1591 9.36984 15.9791 9.21984C15.9591 9.20984 15.8991 9.15984 15.8191 9.07984C15.5091 8.82984 15.1791 8.48984 14.8691 8.11984C14.8491 8.09984 14.7891 8.03984 14.7391 7.94984C14.6391 7.83984 14.4891 7.64984 14.3591 7.43984C14.2491 7.29984 14.1191 7.09984 13.9991 6.88984C13.8491 6.63984 13.7191 6.38984 13.5991 6.12984C13.4691 5.84984 13.3691 5.58984 13.2791 5.33984L7.89912 10.7198C7.54912 11.0698 7.20912 11.7298 7.13912 12.2198L6.70912 15.1998C6.61912 15.8298 6.78912 16.4198 7.17912 16.8098C7.50912 17.1398 7.95912 17.3098 8.45912 17.3098C8.56912 17.3098 8.67912 17.2998 8.78912 17.2898L11.7591 16.8698C12.2491 16.7998 12.9091 16.4698 13.2591 16.1098L18.6391 10.7298C18.3891 10.6498 18.1391 10.5398 17.8591 10.4198Z" fill="#0073ff"></path> </g></svg>
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach

                </div>
            </div>
            <!-- Files gallery END -->
            <!-- Main content END -->

            

        </section>
        <aside class="w-1/1 md:w-1/4 px-4">

            <!-- Description -->
            <h3>Description</h3>
            <div class="relative mb-3" data-te-input-wrapper-init>
            <textarea
                class="text-xs leading-[16px] peer block min-h-[14rem] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="description"
                name="description"
                awardData
                rows="3"
                placeholder="Short info...">{{ $award->description }}</textarea>
            <label
                for="description"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                >Project breaf</label
            >
            </div>
            <!-- Description END -->


            <!-- Settings -->
            <h3>Settings</h3>
            <div class="rounded-md border p-1 ">

                <!-- Type -->
                <select class="px-3" 
                    id="awardType"
                    name="awardType"
                    awardData
                    data-te-select-init>
                    @foreach($award_type_options as $at_option)
                    <option value="{{ $at_option->value }}" {{ $at_option->selected }}>{{ $at_option->text }}</option>
                    @endforeach
                    
                </select>
                <!-- Type END -->

                <!--Permalink -->
                <div class="relative mt-2 mb-3" data-te-input-wrapper-init>
                    <!--  TODO: Add award permalink -->
                    <input
                        type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.33rem] text-xs leading-[1.5] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="permalink"
                        name="permalink"
                        awardData
                        placeholder="Form control sm"
                        value=""/>
                    <label
                        for="permalink"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] text-xs leading-[1.5] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.75rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.75rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                        >Permalink
                    </label>
                </div>
    
                <!-- Is Public -->
                <input
                    class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca]"
                    type="checkbox"
                    role="switch"
                    awardData
                    id="isPublic" 
                    <?= ( (int)$award->status === 1) ? "checked='true'" : ""; ?> 
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
                <!-- Is Public END -->

            </div>
            <!-- Settings End -->
        </aside>
    </div>



</main>
@endsection