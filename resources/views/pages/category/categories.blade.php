@extends('app.app')
@section('contents')

    <div class="p-7">
        <div class="">
            <div class="shadown w-full">
                <!-- Header Section -->
                <x-headding-page>
                    <x-slot name="headding">Categoyies</x-slot>
                    <x-slot name="title1">Category</x-slot>
                    <x-slot name="title2">View Categories</x-slot>

                </x-headding-page>

                <div class="mx-auto mt-6 bg-mode px-5 py-2.5">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <span class="text-gray-700 font-medium">Show</span>
                                <select
                                    class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                                <span class="text-gray-700 font-medium">Entries</span>
                            </div>

                            <div class="relative">
                                <input type="text" placeholder="search"
                                    class="border border-gray-300 rounded-md pl-4 pr-10 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                                <i
                                    class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>

                            {{-- <button
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                                Filter
                            </button> --}}
                            <x-booton-primary>
                                Fillter
                            </x-booton-primary>
                        </div>
                        <x-booton-primary class="bg-red-700" onclick="loadPage('createCategory')">
                            New
                        </x-booton-primary>
                        {{-- <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center gap-2 transition-colors">
                            <i class="fas fa-plus"></i>
                            Add
                        </button> --}}
                    </div>
                </div>

                <!-- Table Section -->
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
                        <tbody class="divide-y divide-gray-200">
                            @foreach($categories as $key => $category)

                                <tr id="category-row-{{$category->id}}" class="hover:bg-gray-50">
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
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen">
                                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path
                                                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                            </svg>
                                        </button>
                                        <button onclick="deleteItem({{$category['id']}})"
                                            class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
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
@endsection