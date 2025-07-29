@extends('app.app')
@section('contents')
    <div class="container mx-auto px-4 py-8 shadow">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold ">Users Management</h1>
                    <p class="text-gray-400 mt-1">Manage and view all purchases users</p>
                </div>
                <div class="flex gap-3">
                    <button onclick="addUserCourse()" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="flex gap-1.5 text-white cursor-pointer items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user-plus-icon lucide-user-plus">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <line x1="19" x2="19" y1="8" y2="14" />
                            <line x1="22" x2="16" y1="11" y2="11" />
                        </svg>
                        add course
                    </button>
                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                        <i class="fas fa-download"></i>
                        Export
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-mode rounded-lg shadow-sm border p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Users</p>
                        <p class="text-2xl font-bold ">1,234</p>
                    </div>
                    <div class="p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user-icon lucide-user">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">+12% from last month</p>
            </div>

            <div class="bg-mode rounded-lg shadow-sm border p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Users</p>
                        <p class="text-2xl font-bold ">1,180</p>
                    </div>
                    <div class=" p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user-check-icon lucide-user-check">
                            <path d="m16 11 2 2 4-4" />
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                        </svg>

                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">95.6% active rate</p>
            </div>

            <div class="bg-mode rounded-lg shadow-sm border p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">New This Month</p>
                        <p class="text-2xl font-bold ">89</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-user-plus text-purple-600"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">+8% from last month</p>
            </div>

            <div class="bg-mode rounded-lg shadow-sm border p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Inactive Users</p>
                        <p class="text-2xl font-bold ">54</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full">
                        <i class="fas fa-user-times text-red-600"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">4.4% inactive rate</p>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="bg-mode rounded-lg shadow-sm border mb-6">
            <div class="p-6">
                <form method="GET" action="{{ route('get-users-purchases.index') }}">
                    <div class="flex flex-col lg:flex-row gap-4">
                        <!-- Search Input -->

                        <div class="flex w-[80%] border-1 border-gray-400 items-center  rounded-lg overflow-hidden">

                            <div class="relative w-full">
                                {{-- <i class="fas fa-search absolute left-3 top-[30%] transform  text-gray-400"></i> --}}
                                <input name="search" value="{{ request('search') }}" type="text"
                                    placeholder="Search users by name, email, or ID..."
                                    class="w-full focus:outline-0 pl-5 border border-none rounded-lg  focus:ring-0 focus:border-transparent">
                            </div>
                            <button class="px-5 bg-green-600 h-full text-white hover:bg-green-700 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-search-icon lucide-search">
                                    <path d="m21 21-4.34-4.34" />
                                    <circle cx="11" cy="11" r="8" />
                                </svg>

                            </button>
                        </div>

                        <!-- Filters -->
                        <div class="">
                            <select name=""
                                class="flex py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option hidden>by category</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="pending">Pending</option>
                            </select>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-mode rounded-lg shadow-sm border overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-mode border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left">
                                id
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium  uppercase tracking-wider">
                                <div class="flex items-center gap-2 cursor-pointer hover:text-gray-700">
                                    User
                                    <i class="fas fa-sort text-gray-400"></i>
                                </div>
                            </th>
                            {{-- <th class="px-6 py-4 text-left text-xs font-medium  uppercase tracking-wider">
                                <div class="flex items-center gap-2 cursor-pointer hover:text-gray-700">
                                    Role
                                    <i class="fas fa-sort text-gray-400"></i>
                                </div>
                            </th> --}}
                            <th class="px-6 py-4 text-left text-xs font-medium  uppercase tracking-wider">
                                <div class="flex items-center gap-2 cursor-pointer hover:text-gray-700">
                                    Status
                                    <i class="fas fa-sort text-gray-400"></i>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium  uppercase tracking-wider">
                                <div class="flex items-center gap-2 cursor-pointer hover:text-gray-700">
                                    Joined Date
                                    <i class="fas fa-sort text-gray-400"></i>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium  uppercase tracking-wider">
                                Counts Courses
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-medium  uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-mode divide-y divide-gray-200">
                        <!-- Sample User Row 1 -->
                        @if (empty($users) || $users->isEmpty())
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    No users found.
                                </td>
                            </tr>
                        @endif

                        @foreach ($users as $key => $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">

                                        {{ $key + 1 }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">

                                        <div class="ml-4">
                                            <div class="text-sm font-medium ">{{ $user['name'] }}</div>
                                            <div class="text-sm text-gray-500">{{ $user['email'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                    Admin
                                </span>
                            </td> --}}
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <span class="w-1.5 h-1.5 bg-green-400 rounded-full mr-1.5"></span>
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm ">
                                    {{ $user['created_at'] }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    2 hours ago
                                </td>
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                            onclick="view('{{ $user['id'] }}')"
                                            class="block text-green-400 cursor-pointer  focus:ring-0 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center"
                                            type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-eye-icon lucide-eye">
                                                <path
                                                    d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>

                                        </button>
                                        <button class="text-green-600 hover:text-green-900 p-1 rounded transition-colors"
                                            title="Edit">
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 p-1 rounded transition-colors"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>

                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div id="pagination-links" class="bg-mode">
                    {{ $users->links('vendor.pagination.tailwind') }}
                </div>

            </div>

            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-4xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-xl font-semibold ">
                                View user
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->

                        <div class="container mx-auto ">


                            <div class="w-full">
                                <!-- Cart Items -->
                                <div class="lg:col-span-8">
                                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                                        <div class="divide-y divide-gray-200">
                                            <!-- Item 1 -->
                                            <div class="p-6">
                                                <div class="">

                                                    <div class="flex-1 min-w-0">
                                                        <div class="relative overflow-x-auto">
                                                            <table class="w-full text-sm text-left rtl:text-right">
                                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                                                    <tr>

                                                                        <th scope="col" class="px-6 py-3">
                                                                            id
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">
                                                                            user name
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">
                                                                            emaile
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">
                                                                            phone
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">
                                                                            register at
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbl_user">


                                                                </tbody>
                                                            </table>

                                                        </div>

                                                        <div class="flex items-center justify-end mt-4">

                                                            <div class="text-right">
                                                                <a href=""
                                                                    class="flex gap-1.5 hover:bg-gray-200 bg-gray-100 px-3.5 py-2 rounded-md">View
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                        height="20" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="lucide lucide-circle-ellipsis-icon lucide-circle-ellipsis">
                                                                        <circle cx="12" cy="12" r="10" />
                                                                        <path d="M17 12h.01" />
                                                                        <path d="M12 12h.01" />
                                                                        <path d="M7 12h.01" />
                                                                    </svg>

                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>


                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        add new course
                    </h3>
                    <button type="button"
                        class="text-gray-400 cursor-pointer bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                           <select name="userName" id="userName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                            <option hidden>Select user</option>
                            
                           </select>
                        </div>
                      
                        <div class="col-span-2 ">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option hidden>Select course</option>
                              
                            </select>
                        </div>
                       <div class="relative max-w-sm">
  <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
     <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
      </svg>
  </div>
  <input name="create_at" id="datepicker-actions" datepicker datepicker-buttons datepicker-autoselect-today type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
</div>
                    </div>
                    <button type="button" onclick="addNewUserCourse()"
                        class="text-white inline-flex items-center cursor-pointer bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
