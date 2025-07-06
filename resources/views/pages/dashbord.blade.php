@extends('app.app')
@section('contents')
    <div class="p-8">
        <div class="max-w-7xl mx-auto space-y-12">
            {{-- <h1 class="text-2xl font-medium mb-8">Hello, Super Admin</h1> --}}
            <x-headding>
                Hello, Super Admin
            </x-headding>
            <button id="add">add</button>
            <!-- Stats Cards Container -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Student Card -->
                <div class="bg-mode rounded-lg p-6 flex items-center space-x-4">
                    <div class="w-12 h-12 bg-green-400 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-users-icon lucide-users">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <path d="M16 3.128a4 4 0 0 1 0 7.744" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <circle cx="9" cy="7" r="4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm">Total Student</p>
                        <p class="text-3xl font-bold">49</p>
                    </div>
                </div>

                <!-- Total Instructor Card -->
                <div class="bg-mode rounded-lg p-6 flex items-center space-x-4">
                    <div class="w-12 h-12 bg-yellow-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 " fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class=" text-sm">Total Instructor</p>
                        <p class="text-3xl font-bold ">1</p>
                    </div>
                </div>

                <!-- Total Course Card -->
                <div class="bg-mode rounded-lg p-6 flex items-center space-x-4">
                    <div class="w-12 h-12 bg-teal-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 " fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                    </div>
                    <div>
                        <p class=" text-sm">Total Course</p>
                        <p class="text-3xl font-bold">{{$countCourses}}</p>
                    </div>
                </div>

                <!-- Total Sales Card -->
                <div class="bg-mode rounded-lg p-6 flex items-center space-x-4">
                    <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 " fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                        </svg>
                    </div>
                    <div>
                        <p class=" text-sm">Total Sales</p>
                        <p class="text-3xl font-bold ">{{$countCourses}}</p>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto">
                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Top Courses Table -->
                    <div class="bg-mode lg:col-span-2 rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold  mb-6">Top courses</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 px-2  font-medium text-sm">ID</th>
                                        <th class="text-left py-3 px-2  font-medium text-sm">NAME</th>
                                        <th class="text-left py-3 px-2  font-medium text-sm">ENROLL</th>
                                        <th class="text-left py-3 px-2  font-medium text-sm">SALES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-4 px-2 ">1</td>
                                        <td class="py-4 px-2 ">Build a full stack NFT Marketplace using...</td>
                                        <td class="py-4 px-2 ">5</td>
                                        <td class="py-4 px-2 ">$80.00</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-4 px-2 ">2</td>
                                        <td class="py-4 px-2 ">The Complete 2023 Web Development Bootca...</td>
                                        <td class="py-4 px-2 ">4</td>
                                        <td class="py-4 px-2 ">0.00</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-4 px-2 ">3</td>
                                        <td class="py-4 px-2 ">The Complete ChatGPT Web Development Cod...</td>
                                        <td class="py-4 px-2 ">2</td>
                                        <td class="py-4 px-2 ">0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 px-2 ">4</td>
                                        <td class="py-4 px-2 ">The Web Developer Bootcamp 2023</td>
                                        <td class="py-4 px-2 ">0</td>
                                        <td class="py-4 px-2 ">0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Summary Panel -->
                    <div class="bg-mode rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold  mb-6">Summary</h2>
                        <div class="space-y-4">
                            <!-- Total Student -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="users" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Total Student</span>
                                </div>
                                <span class="text-green-500 font-semibold">49</span>
                            </div>

                            <!-- Total Instructor -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="user" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Total Instructor</span>
                                </div>
                                <span class="text-green-500 font-semibold">1</span>
                            </div>

                            <!-- Total Active Course -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="book-open" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Total Active Course</span>
                                </div>
                                <span class="text-green-500 font-semibold">4</span>
                            </div>

                            <!-- Total Pending Course -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="clock" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Total Pending Course</span>
                                </div>
                                <span class="text-green-500 font-semibold">0</span>
                            </div>

                            <!-- Featured Course -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="star" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Featured Course</span>
                                </div>
                                <span class="text-green-500 font-semibold">4</span>
                            </div>

                            <!-- Discount Course -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="tag" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Discount Course</span>
                                </div>
                                <span class="text-green-500 font-semibold">2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto">
                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Top Courses Table -->
                    <div class="bg-mode lg:col-span-2 rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold  mb-6">Top courses</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 px-2  font-medium text-sm">ID</th>
                                        <th class="text-left py-3 px-2  font-medium text-sm">NAME</th>
                                        <th class="text-left py-3 px-2  font-medium text-sm">ENROLL</th>
                                        <th class="text-left py-3 px-2  font-medium text-sm">SALES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-4 px-2 ">1</td>
                                        <td class="py-4 px-2 ">Build a full stack NFT Marketplace using...</td>
                                        <td class="py-4 px-2 ">5</td>
                                        <td class="py-4 px-2 ">$80.00</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-4 px-2 ">2</td>
                                        <td class="py-4 px-2 ">The Complete 2023 Web Development Bootca...</td>
                                        <td class="py-4 px-2 ">4</td>
                                        <td class="py-4 px-2 ">0.00</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-4 px-2 ">3</td>
                                        <td class="py-4 px-2 ">The Complete ChatGPT Web Development Cod...</td>
                                        <td class="py-4 px-2 ">2</td>
                                        <td class="py-4 px-2 ">0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 px-2 ">4</td>
                                        <td class="py-4 px-2 ">The Web Developer Bootcamp 2023</td>
                                        <td class="py-4 px-2 ">0</td>
                                        <td class="py-4 px-2 ">0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Summary Panel -->
                    <div class="bg-mode rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold  mb-6">Summary</h2>
                        <div class="space-y-4">
                            <!-- Total Student -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="users" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Total Student</span>
                                </div>
                                <span class="text-green-500 font-semibold">49</span>
                            </div>

                            <!-- Total Instructor -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="user" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Total Instructor</span>
                                </div>
                                <span class="text-green-500 font-semibold">1</span>
                            </div>

                            <!-- Total Active Course -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="book-open" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Total Active Course</span>
                                </div>
                                <span class="text-green-500 font-semibold">4</span>
                            </div>

                            <!-- Total Pending Course -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="clock" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Total Pending Course</span>
                                </div>
                                <span class="text-green-500 font-semibold">0</span>
                            </div>

                            <!-- Featured Course -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="star" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Featured Course</span>
                                </div>
                                <span class="text-green-500 font-semibold">4</span>
                            </div>

                            <!-- Discount Course -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i data-lucide="tag" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class=" text-sm">Discount Course</span>
                                </div>
                                <span class="text-green-500 font-semibold">2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection




{{-- <!-- Buttons Section -->
<section>
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Buttons</h2>
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex flex-wrap gap-4">
            <!-- Primary Buttons -->
            <button class="px-4 py-2 bg-blue-600  rounded-lg hover:bg-blue-700 transition-colors">
                Primary Button
            </button>
            <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                Success Button
            </button>
            <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                Danger Button
            </button>
            <button
                class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                Secondary Button
            </button>
        </div>
    </div>
</section>

<!-- Form Elements -->
<section>
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Form Elements</h2>
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Text Input</label>
                <input type="text" placeholder="Enter text..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Dropdown</label>
                <select
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>Choose option...</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Textarea</label>
                <textarea rows="3" placeholder="Enter description..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>
            </div>
        </form>
    </div>
</section>

<!-- Cards Section -->
<section>
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Cards</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Basic Card</h3>
            <p class=" mb-4">This is a basic card with some content.</p>
            <button class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                Action
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <img src="/placeholder.svg?height=160&width=300" alt="Course" class="w-full h-40 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Course Card</h3>
                <p class=" text-sm mb-3">Course description...</p>
                <div class="flex items-center justify-between">
                    <span class="text-sm ">⭐ 4.8 (120)</span>
                    <span class="text-lg font-bold text-blue-600">$99</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alerts Section -->
<section>
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Alerts</h2>
    <div class="space-y-4">
        <!-- Success Alert -->
        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h4 class="text-sm font-medium text-green-800">Success!</h4>
                    <p class="text-sm text-green-700">Your changes have been saved successfully.</p>
                </div>
            </div>
        </div>

        <!-- Error Alert -->
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h4 class="text-sm font-medium text-red-800">Error!</h4>
                    <p class="text-sm text-red-700">Something went wrong. Please try again.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Badges Section -->
<section>
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Badges & Tags</h2>
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex flex-wrap gap-2">
            <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Active</span>
            <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
            <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Inactive</span>
            <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded">Programming</span>
            <span class="px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded">Design</span>
        </div>
    </div>
</section> --}}