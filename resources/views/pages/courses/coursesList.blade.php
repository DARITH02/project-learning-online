@extends('app.app')
@section('contents')

<div  class="p-7">
    <div class="min-h-screen w-full">
        <!-- Header Section -->
        <x-headding-page class="rounded-md">
            <x-slot name='headding'>Create Courses</x-slot>
            <x-slot name='title1'>Courses</x-slot>
            <x-slot name='title2'>View Courses</x-slot>
            {{-- <x-slot name='title3'> </x-slot> --}}
        </x-headding-page>

        <!-- Main Content -->
        <div class="w-full mt-5 bg-mode">
            <div class="rounded-lg shadow-sm">
                <!-- Controls Section -->
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-4 flex-wrap">
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

                            <select
                                class="border border-gray-300 rounded-md px-3 py-2 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-[140px]">
                                <option>Select Category</option>
                                <option>Software Development</option>
                                <option>Website Development</option>
                                <option>Mobile Development</option>
                                <option>Desktop Development</option>
                            </select>

                            <select
                                class="border border-gray-300 rounded-md px-3 py-2 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-[140px]">
                                <option>Select Instructor</option>
                                <option>Instructor 1</option>
                                <option>Instructor 2</option>
                            </select>

                            <select
                                class="border border-gray-300 rounded-md px-3 py-2 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-[120px]">
                                <option>Select Status</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>

                            <div class="">
                                <input type="text" placeholder="search"
                                    class="border border-gray-300 rounded-md pl-4 pr-10 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                                <i
                                    class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>

                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                                Filter
                            </button>
                        </div>

                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center gap-2 transition-colors">
                            <i class="fas fa-plus"></i>
                            Add
                        </button>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    TITLE</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    CATEGORY</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    INSTRUCTOR</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    CONTENT</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ENROLLMENT</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    PRICE</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    COURSE TYPE</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    STATUS</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    VISIBILITY</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="#" class="text-blue-600 hover:text-blue-800">Build a full stack N...</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Software Development</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Instructor : <span class="text-blue-600">instructor</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div>Total Section : 12.00</div>
                                    <div>Total Lesson : 4.00</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">0.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$100.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-blue-600 text-sm">Recorded</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-teal-100 text-teal-800">
                                        Public
                                    </span>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="#" class="text-blue-600 hover:text-blue-800">The Complete ChatGPT...</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Website Development</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Instructor : <span class="text-blue-600">instructor</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div>Total Section : 3.00</div>
                                    <div>Total Lesson : 0.00</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">0.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Free</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-blue-600 text-sm">Recorded</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-teal-100 text-teal-800">
                                        Public
                                    </span>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="#" class="text-blue-600 hover:text-blue-800">The Complete 2023 We...</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mobile Development</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Instructor : <span class="text-blue-600">instructor</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div>Total Section : 2.00</div>
                                    <div>Total Lesson : 0.00</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">0.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$160.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-blue-600 text-sm">Recorded</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-teal-100 text-teal-800">
                                        Public
                                    </span>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">4</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="#" class="text-blue-600 hover:text-blue-800">The Web Developer Boo...</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Desktop Development</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Instructor : <span class="text-blue-600">instructor</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div>Total Section : 6.00</div>
                                    <div>Total Lesson : 1.00</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">0.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$120.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-blue-600 text-sm">Recorded</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-teal-100 text-teal-800">
                                        Public
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection