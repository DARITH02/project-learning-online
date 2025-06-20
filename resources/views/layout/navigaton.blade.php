<nav class="bg-mode w-full px-5 py-2 shadow-sm h-auto z-50">
    <div class="flex justify-between items-center h-16">
        <!-- Left side - Back and Home icons -->
        <div class="flex items-center space-x-4">
            <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </button>
            <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-5 h-5 " stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Right side - Language, Theme, Fullscreen -->
        <div class="flex items-center space-x-2">
            <!-- Language Selector -->
            <div class="relative">
                <button
                    class="flex items-center space-x-1 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    <span class="text-sm font-medium ">English</span>
                    <svg class="w-4 h-4 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Theme Toggle -->
            <button id="toggle-theme" class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <span id="theme-icon">

                    {{-- <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                    </path> --}}
                </svg>
            </span>
            </button>

            <!-- Fullscreen Toggle -->
            <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                    </path>
                </svg>
            </button>
        </div>
    </div>


</nav>