@extends('app.app')
@section('contents')

    <div class="px-7">
        <div class="">
            <div class="shadown w-full">
                <!-- Header Section -->
                <div class="flex w-full items-center">
                    <a href="{{route('/')}}"
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
                        <x-slot name='headding'>Category</x-slot>
                        <x-slot name='title1'>category</x-slot>
                        <x-slot name='title2'>View All</x-slot>
                    </x-headding-page>
                </div>
                <div class="mx-auto mt-6 bg-mode px-5 py-2.5">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                      
                        <x-booton-primary class="flex gap-2.5 cursor-pointer" onclick="loadPage('createCategory')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-plus-icon lucide-square-plus"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                            New
                        </x-booton-primary>
                
                    </div>
                </div>

             
                <div class="overflow-x-auto mt-4 bg-mode shadow-sm">
                    <table class="w-full">
                        <thead class="border-b ">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    TITLE
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ICON
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    PARENT
                                    CATEGORY</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    COURSE
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    STATUS
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    CREATED
                                    AT</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ACTION
                                </th>
                            </tr>
                        </thead>

                        <tbody id="tbl-body" class="divide-y divide-gray-200">

                            @foreach($categories as $key => $category)

                                <tr class="hover:bg-gray-50 category-row-{{$category->id}}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$key + 1}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$category->title}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                            <i class="fas fa-code text-gray-500 text-sm"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10-12-2024</td>
                                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2.5" colspan="2">
                                        <button type="button" onclick="loadPage('/editCate/{{$category->id}}')"
                                            class="text-gray-100 hover:text-white bg-blue-500 p-2 rounded-md hover:bg-blue-700 flex px-3 gap-1.5 cursor-pointer duration-150">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen">
                                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path
                                                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                            </svg>
                                            edit
                                        </button>
                                        <button onclick="deleteItem('/deleteCategory/',{{$category['id']}})"
                                            class="text-gray-100 hover:text-white bg-rose-800 p-2 rounded-md hover:bg-rose-900 px-3 flex gap-1.5 cursor-pointer duration-150">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                            </svg>
                                            delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>


                {{-- {{$categories->links()}} --}}

                {{-- href="?page=2" --}}
                {{-- {{ $categories->links('vendor.pagination.tailwind') }} --}}

                {{-- <nav>
                    <ul class="pagination">
                        <li><a href="?page=2">2</a></li>
                    </ul>
                </nav> --}}






            </div>
        </div>
    </div>
    <div>

 <script src="{{ asset('js/loadingPage.js') }}"></script>

@endsection