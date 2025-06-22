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
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Software Development</td>
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
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Website Development</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-globe text-gray-500 text-sm"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Software Development</td>
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
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Mobile Development</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-mobile-alt text-gray-500 text-sm"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Software Development</td>
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
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">4</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Desktop Development</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-desktop text-gray-500 text-sm"></i>
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
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">5</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Game Development</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-gamepad text-gray-500 text-sm"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Desktop Development</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">0</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10-12-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">6</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Search Engine Optimi...</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-search text-gray-500 text-sm"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Desktop Development</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">0</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10-12-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection