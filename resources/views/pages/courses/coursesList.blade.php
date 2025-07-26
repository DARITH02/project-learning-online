@extends('app.app')
@section('contents')

    <div class="px-7">
        <div class="w-full">
            <!-- Header Section -->
            <div class="flex w-full items-center">
                <a href="{{route('viewCourses')}}"
                    class=" block w- cursor-pointer hover:bg-gray-500 duration-200  px-3 py-2 my-2 rounded-md"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-arrow-left-icon lucide-circle-arrow-left">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m12 8-4 4 4 4" />
                        <path d="M16 12H8" />
                    </svg>
                </a>
                <x-headding-page class="block w-full">
                    <x-slot name='headding'>Courses</x-slot>
                    <x-slot name='title1'>course</x-slot>
                    <x-slot name='title2'>View All</x-slot>
                </x-headding-page>
            </div>

            <!-- Main Content -->
            <div class="w-full mt-5">
                <div class="rounded-lg shadow-sm">
                    <!-- Controls Section -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between flex-wrap gap-4">
                          

                            <button onclick="loadPage('create-courses')"
                                class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center gap-2 transition-colors">
                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-plus-icon lucide-square-plus"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                                Add
                            </button>
                        </div>
                    </div>



                    <!-- Table Section -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="border-b border-gray-200">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        TITLE</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        CATEGORY</th>

                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        CONTENT</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ENROLLMENT</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        PRICE</th>

                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        STATUS</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        VISIBILITY</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($data as $key => $datas)

                                    <tr class="hover:bg-gray-50 category-row-{{$datas->id}}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$key + 1}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="#" class="text-blue-600 hover:text-blue-800">{{$datas->title}}</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$datas->cate_id}}</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div>Total Section : {{$datas->modules_count}}</div>
                                            <div>Total Lesson : 4.00</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">0.00</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{$datas->price}}</td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="{{ $datas->status === 'draft' ? 'text-red-800' : 'text-green-800'}}  inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100">
                                                {{$datas->status}}
                                            </span>
                                        </td>
                                        <td colspan="2" class="px-6 flex-row items-center space-x-3.5 py-4 whitespace-nowrap">
                                            <span class="inline-block relative z-0">
                                                <button
                                                    class="action relative  px-1 py-0.5 rounded-md shadow-2xs cursor-pointer hover:bg-gray-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-ellipsis-vertical-icon lucide-ellipsis-vertical">
                                                        <circle cx="12" cy="12" r="1" />
                                                        <circle cx="12" cy="5" r="1" />
                                                        <circle cx="12" cy="19" r="1" />
                                                    </svg></button>
                                                <div id=""
                                                    class="action-modal absolute top-0 -left-[350%]  z-50 items-center 
                                                                                                                                                        hidden bg-gray-200 px-3.5 py-2 justify-center  rounded-lg shadow-2xl transition-opacity duration-300">
                                                    {{-- <div id="actionModalContent"
                                                        class="bg-white rounded-lg p-8 shadow-lg w-full max-w-md scale-95 opacity-0 transition-all duration-300">
                                                        <h2 class="text-xl font-bold mb-4">Action Modal</h2>
                                                        <p>This is your modal content.</p>
                                                        <button onclick="closeActionModal()"
                                                            class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Close</button>
                                                    </div> --}}

                                                    <ul class="flex flex-col gap-1.5">
                                                        <li class="cursor-pointer">
                                                            <a onclick="loadPage('/update-course/{{$datas->id}}')"
                                                                class="flex gap-1 items-center">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15"
                                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    class="lucide lucide-squarse-pen-icon lucide-square-pen">
                                                                    <path
                                                                        d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                                    <path
                                                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                                                </svg>
                                                                Course
                                                            </a>

                                                        </li>
                                                        <li class="">
                                                            <a onclick="loadPage('/edit-module/{{$datas->id}}')"
                                                                class="flex gap-1 cursor-pointer items-center">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15"
                                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    class="lucide lucide-squarse-pen-icon lucide-square-pen">
                                                                    <path
                                                                        d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                                    <path
                                                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                                                </svg>
                                                                Modules
                                                            </a>

                                                        </li>

                                                    </ul>

                                                </div>


                                            </span>

                                            {{-- <button class="text-blue-700"
                                                onclick="loadPage('/update-course/{{$datas->id}}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-square-pen-icon lucide-square-pen">
                                                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                    <path
                                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                                </svg>
                                            </button> --}}
                                            <button class="text-red-800 cursor-pointer" onclick="deleteItem('/del-course/',{{$datas->id}})"
                                                data-url="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-trash2-icon lucide-trash-2">
                                                    <path d="M3 6h18" />
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                    <line x1="10" x2="10" y1="11" y2="17" />
                                                    <line x1="14" x2="14" y1="11" y2="17" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/loadingPage.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @endsection