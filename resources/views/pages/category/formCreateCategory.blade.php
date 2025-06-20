@extends('app.app')
@section('contents')

    <div class="w-full p-8">
        <x-headding-page>
            <x-slot name='headding'>Create Courses </x-slot>
            <x-slot name='title1'>courses</x-slot>
            <x-slot name='title2'>Create</x-slot>
        </x-headding-page>
        <div class="bg-mode mx-auto rounded-lg shadow-sm m-5 p-7">
            <form class="space-y-6">
                <!-- Title Field -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" placeholder="Enter Title"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 placeholder-gray-400"
                        required>
                </div>

                <!-- Parent Category and Status Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Parent Category -->
                    <div>
                        <label for="parent-category" class="block text-sm font-medium text-gray-700 mb-2">
                            Parent Category
                        </label>
                        <div class="relative">
                            <select id="parent-category" name="parent-category"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500 appearance-none bg-white">
                                <option value="">Select Parent Category</option>
                                <option value="software-development">Software Development</option>
                                <option value="web-development">Web Development</option>
                                <option value="mobile-development">Mobile Development</option>
                                <option value="desktop-development">Desktop Development</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select id="status" name="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 appearance-none bg-white"
                                required>
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Icon Upload Field -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                        Icon <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" id="icon" name="icon" accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" required>
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center hover:border-gray-400 transition-colors">
                            <div class="flex flex-col items-center justify-center space-y-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                                    <i class="fas fa-plus text-gray-500 text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        NB : Icon size will 35px x 35px and not more than 1mb
                    </p>
                </div>

                <!-- Create Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-8 py-3 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Handle file upload preview
        document.getElementById('icon').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const uploadArea = document.querySelector('.border-dashed');
                    uploadArea.innerHTML = `
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <img src="${e.target.result}" alt="Preview" class="w-16 h-16 object-cover rounded-lg">
                                    <p class="text-sm text-gray-600">${file.name}</p>
                                </div>
                            `;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

@endsection