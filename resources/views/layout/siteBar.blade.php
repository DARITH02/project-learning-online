<div class="bg-mode w-full shadow-sm border-r border-gray-200 h-full">
    <!-- Logo -->
    <div class="px-5 py-2.5 border-b border-gray-200">
        <div class="flex items-center space-x-3 pl-2">
            <a href="{{route('/')}}" class="w-full flex items-center">
                <div class="w-15 h-15 bg-gradient-to-br  rounded-lg flex items-center justify-center">
                    <img class="w-full h-full" src="{{asset('storage/logo/logo-etec.png')}}" alt="">
                    {{-- <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg> --}}
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">ETEC CENTER</h1>
                    {{-- <p class="text-sm text-gray-500">LMS</p> --}}
                </div>
        </div>
        </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="py-4 h-full w-full">

        <div class="rounded-lg">

            <!-- Example Menu Item -->
            <div class="w-full">
                <div onclick="toggleSubmenu(this);" data-id="courses"
                    class="submenu-header flex items-center cursor-pointer p-4 hover:bg-gray-50 ">
                    <svg class="w-5 h-5  mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="flex-1 text-sm font-medium ">Courses</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-200 chevron" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
                <div class="submenu max-h-0 overflow-hidden transition-all duration-300 ">
                    <div class="submenu-item px-6 py-2 text-sm hover:bg-gray-200 cursor-pointer relative"
                        onclick="setActive(this);loadPage('viewCourses')">Courses List</div>
                    <div class="submenu-item px-6 py-2 text-sm font-medium  hover:bg-blue-100 cursor-pointer relative"
                        onclick="setActive(this);loadPage('viewcategory')">Categories List</div>
                    <div class="submenu-item px-6 py-2 text-sm font-medium  hover:bg-blue-100 cursor-pointer relative"
                        onclick="setActive(this);loadPage('lessionCreate')">Lession</div>
                    <div class="submenu-item px-6 py-2 text-sm font-medium  hover:bg-blue-100 cursor-pointer relative"
                        onclick="setActive(this);loadPage('create-module')">Modules</div>
                </div>
            </div>

            <!-- Repeat the same for other menu sections (Users, Analytics...) -->
            <!-- Example below is Users -->
            <div class="w-full">
                <div onclick="toggleSubmenu(this)" data-id="settings"
                    class="submenu-header flex items-center cursor-pointer p-4 hover:bg-gray-50 ">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="flex-1 text-sm font-medium">Users</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-200 chevron" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
                <div class="submenu max-h-0 overflow-hidden transition-all duration-300">
                    <div class="submenu-item px-6 py-2 text-sm hover:bg-gray-200 cursor-pointer"
                        onclick="setActive(this)" data-id="u1">All Users</div>
                    <div class="submenu-item px-6 py-2 text-sm hover:bg-gray-200 cursor-pointer"
                        onclick="setActive(this)" data-id="u2">Add User</div>
                    <div class="submenu-item px-6 py-2 text-sm hover:bg-gray-200 cursor-pointer"
                        onclick="setActive(this)" data-id="u3">User Roles</div>
                </div>
            </div>

        </div>


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


        <script>
            // function toggleSubmenu(header) {
            //   const submenu = header.nextElementSibling;
            //   const chevron = header.querySelector('.chevron');

            //   const allSubmenus = document.querySelectorAll('.submenu');
            //   const allChevrons = document.querySelectorAll('.chevron');

            //   allSubmenus.forEach(menu => {
            //     if (menu !== submenu) {
            //       menu.classList.remove('max-h-40');
            //       menu.classList.add('max-h-0');
            //     }
            //   });

            //   allChevrons.forEach(chev => {
            //     if (chev !== chevron) chev.classList.remove('rotate-180');
            //   });

            //   submenu.classList.toggle('max-h-0');
            //   submenu.classList.toggle('max-h-40');
            //   chevron.classList.toggle('rotate-180');
            // }

            // function setActive(item) {
            //   document.querySelectorAll('.submenu-item').forEach(i => {
            //     i.classList.remove('active', 'bg-blue-50', 'text-blue-600', 'font-medium');
            //     i.classList.add('text-gray-700');
            //   });

            //   item.classList.add('active', 'bg-blue-50', 'text-blue-600', 'font-medium');
            //   item.classList.remove('text-gray-700');
            // }

            // // Auto-expand first menu on load
            // document.addEventListener('DOMContentLoaded', () => {
            //   const firstHeader = document.querySelector('.menu-item .flex');
            //   if (firstHeader) toggleSubmenu(firstHeader);
            // });
        </script>
    </nav>
</div>