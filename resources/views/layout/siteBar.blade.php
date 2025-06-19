<div class="bg-mode w-full shadow-sm border-r border-gray-200 h-full">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div
                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-orange-500 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-900">ONEST</h1>
                <p class="text-sm text-gray-500">LMS</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="py-4 h-full w-full">
        <ul class="w-full flex-col flex space-y-3.5">
            <li class="w-full ">
                <!-- Dashboard -->
                <a href="{{route('/')}}" class="{{request()->routeIs('/') ? 'border-blue-700 border-l-3 text-blue-700' : '' }} 
                        flex items-center justify-between px-5 py-2.5 text-sm font-medium">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="w-full ">
                <span class="items-center justify-between block py-2.5 text-sm font-medium  ">
                    <button class="flex gap-3 items-center bg-show-togle pl-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-book-open-icon lucide-book-open">
                            <path d="M12 7v14" />
                            <path
                                d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z" />
                        </svg>
                        Courses
                    </button>
                    <!-- Dashboard -->
                    <ul class="pl-3 mt-3 w-full h-20 bg-gray-700 togle-show hidden">
                        <li class="w-full px-2.5 py-3.5 ">
                            <a href="{{route('viewsCourses')}}"
                                class="{{request()->routeIs('viewsCourses' ? 'text-blue-700' : '')}}">

                                Courses
                            </a>
                        </li>
                        <li>
                            Category
                        </li>
                    </ul>
                    {{-- <a href="{{ route('courses')}}"
                        class="{{ request()->routeIs('courses') ? 'border-l-3  border-blue-700 text-blue-700' : ''}} flex items-center justify-between px-3 py-2.5 text-sm font-medium ">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                    </a> --}}
                </span>

            </li>
            <li class="w-full ">
                <span class=" px-5 items-center justify-between block  py-2.5 text-sm font-medium">
                    <button class="flex gap-3 items-center bg-show-togle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-book-open-icon lucide-book-open">
                            <path d="M12 7v14" />
                            <path
                                d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z" />
                        </svg>
                        Courses
                    </button>
                    <!-- Dashboard -->
                    <ul class="pl-3 mt-3 w-full h-20 bg-gray-700 togle-show hidden">
                        <li class="w-full px-2.5 py-3.5 ">
                            Courses
                        </li>
                        <li>
                            Category
                        </li>
                    </ul>
                    {{-- <a href="{{ route('courses')}}"
                        class="{{ request()->routeIs('courses') ? 'border-l-3  border-blue-700 text-blue-700' : ''}} flex items-center justify-between px-3 py-2.5 text-sm font-medium ">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                    </a> --}}
                </span>

            </li>
        </ul>


        <!-- Staffs -->
        {{-- <a href="#"
            class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                    </path>
                </svg>
                <span>Staffs</span>
            </div>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a> --}}

        <!-- AI Support -->
        {{-- <a href="#"
            class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
                <span>AI Support</span>
            </div>
        </a> --}}

        <!-- Add more menu items as needed -->
    </nav>
</div>