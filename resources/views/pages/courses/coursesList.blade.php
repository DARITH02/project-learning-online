@extends('app.app')
@section('contents')

    <div class="p-7">
        <div class="w-full">
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

                            <button onclick="loadPage('create-courses')"
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
                                            <div>Total Section : 12.00</div>
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
                                        <td colspan="2" class="px-6 flex-row space-x-3.5 py-4 whitespace-nowrap">
                                            <button class="text-blue-700" onclick="loadPage('/update-course/{{$datas->id}}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-square-pen-icon lucide-square-pen">
                                                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                    <path
                                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                                </svg>
                                            </button>
                                            <button class="text-red-800" onclick="deleteItem('/del-course/',{{$datas->id}})"
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

@endsection