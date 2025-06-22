@extends("app.app")
@section('contents')
    <div class="bg-white rounded-lg shadow-sm">
        <!-- Header Controls -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <div class="flex items-center gap-4">
                <!-- Show Entries Dropdown -->
                <div class="flex items-center gap-2">
                    <span class="text-gray-700 text-sm">Show</span>
                    <div class="relative">
                        <select
                            class="appearance-none bg-white border border-gray-300 rounded px-3 py-1 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                        <i data-lucide="chevron-down"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
                    </div>
                    <span class="text-gray-700 text-sm">Entries</span>
                </div>

                <!-- Search Input -->
                <div class="relative">
                    <input type="text" placeholder="search"
                        class="pl-4 pr-10 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                    <i data-lucide="search"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                </div>

                <!-- Filter Button -->
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Filter
                </button>
            </div>

            <!-- Add Button -->
            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Add
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NAME</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">COURSE
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SALES
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">INCOME
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">BALANCE
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">STATUS
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CREATED
                            AT</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ACTION
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                    <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <span class="text-sm text-gray-900">instructor</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">4</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">11</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">0.00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$64.00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Approve
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10-12-2024</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="text-gray-400 hover:text-gray-600">
                                <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection