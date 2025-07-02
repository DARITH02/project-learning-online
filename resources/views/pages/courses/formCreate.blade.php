@extends('app.app')
@section('contents')



    <div class="w-full p-8">
        <x-headding-page>
            <x-slot name='headding'>Create Courses </x-slot>
            <x-slot name='title1'>Category</x-slot>
            <x-slot name='title2'>Create</x-slot>
        </x-headding-page>
        <a href="{{route('viewCourses')}}"
            class=" inline-block cursor-pointer hover:bg-gray-500 duration-200 bg-gray-300 px-3 py-2 my-2 rounded-md"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-circle-arrow-left-icon lucide-circle-arrow-left">
                <circle cx="12" cy="12" r="10" />
                <path d="m12 8-4 4 4 4" />
                <path d="M16 12H8" />
            </svg>
        </a>

        <div class="bg-mode mx-auto rounded-lg shadow-sm z-0">
            {{-- <form id="form-courses" class="space-y-6" data-url="{{ route('create-courses.store') }}">
                <!-- Title Field -->
                <div class="w-full flex gap-3.5">
                    <div class="w-3/12">

                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title" name="title" placeholder="Enter Title"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 placeholder-gray-400"
                            required>
                    </div>
                    <div class="w-3/4">
                        <label for="" class="block text-sm font-medium text-gray-700 mb-2">
                            Description<span class="text-red-500">*</span>
                        </label>
                        <textarea name="desc" rows="5" cols="" id="" placeholder="Enter Title"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 placeholder-gray-400"></textarea>

                    </div>
                </div>


                <!-- Create Button -->
                <div class="pt-4">
                    <button onclick="createCate('#form-courses')" type="button"
                        class="flex gap-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 cursor-pointer py-3 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-square-plus-icon lucide-square-plus">
                            <rect width="18" height="18" x="3" y="3" rx="2" />
                            <path d="M8 12h8" />
                            <path d="M12 8v8" />
                        </svg> Create
                    </button>
                </div>
            </form> --}}

            <div class="w-full mx-auto bg-white rounded-lg shadow-sm p-8">
                <form id="frm-create-courses" class="space-y-6" enctype="multipart/form-data"
                    data-url="{{route('create-courses.store')}}">
                    <!-- Course Title -->
                    <div class="grid grid-rows-1 grid-cols-3 space-x-5">
                        <div class="">
                            <label for="courseTitle" class="block text-sm font-medium text-gray-700 mb-2">
                                Course Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="courseTitle" name="title" placeholder="Enter Title"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>
                        <div class="">
                            <label for="level" class="block text-sm font-medium text-gray-700 mb-2">
                                Level <span class="text-red-500">*</span>
                            </label>
                            <select id="level" name="level"
                                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="beginner" selected>Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                            </select>
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                                Category <span class="text-red-500">*</span>
                            </label>

                            <select id="category" name="category"
                                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option  selected disabled>Select Category</option>
                                @foreach ($category as $cate)
                                    <option value="{{$cate->id}}"> {{$cate->id}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                    <!-- Course Type, Instructor, Level Row -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Course Type -->
                        {{-- <div>
                            <label for="courseType" class="block text-sm font-medium text-gray-700 mb-2">
                                Course Type <span class="text-red-500">*</span>
                            </label>
                            <select id="courseType" name="courseType"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option value="live" selected>Live</option>
                                <option value="recorded">Recorded</option>
                                <option value="hybrid">Hybrid</option>
                            </select>
                        </div> --}}

                        <!-- Instructor -->
                        {{-- <div>
                            <label for="instructor" class="block text-sm font-medium text-gray-700 mb-2">
                                Instructor <span class="text-red-500">*</span>
                            </label>
                            <select id="instructor" name="instructor"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option value="" selected disabled>Select Instructor</option>
                                <option value="john-doe">John Doe</option>
                                <option value="jane-smith">Jane Smith</option>
                                <option value="mike-johnson">Mike Johnson</option>
                            </select>
                        </div> --}}

                        <!-- Level -->

                        <!-- Category -->

                        <!-- Status -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                price <span class="text-red-500">*</span>
                            </label>
                            <input
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                type="number" name="price" id="">
                        </div>

                        <!-- Visibility -->
                        <div>
                            <label for="visibility" class="block text-sm font-medium text-gray-700 mb-2">
                                Visibility <span class="text-red-500">*</span>
                            </label>
                            <select id="visibility" name="status"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option selected value="draft" selected>Draft</option>
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                    </div>

                    <!-- Short Description -->
                    {{-- <div>
                        <label for="shortDescription" class="block text-sm font-medium text-gray-700 mb-2">
                            Short Description
                        </label>
                        <textarea id="shortDescription" name="shortDescription" rows="4"
                            placeholder="Enter Short Description"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"></textarea>
                        <div class="flex justify-end mt-2">
                            <div class="flex space-x-2">
                                <button type="button" class="p-1 text-teal-600 hover:bg-teal-50 rounded">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="p-1 text-teal-600 hover:bg-teal-50 rounded">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Description -->
                    {{-- <input type="text" name="img" class="txt-name"> --}}

                    <div class="flex gap-5">
                        {{-- <div class="border border-gray-300 rounded-md w-1/2">
                            <!-- Toolbar -->
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>
                            <div class="flex items-center space-x-1 p-2 border-b border-gray-200 bg-gray-50">
                                <select class="text-sm border-0 bg-transparent focus:outline-none">
                                    <option>Paragraph</option>
                                    <option>Heading 1</option>
                                    <option>Heading 2</option>
                                </select>
                                <div class="w-px h-4 bg-gray-300 mx-1"></div>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded font-bold">B</button>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded italic">I</button>
                                <div class="w-px h-4 bg-gray-300 mx-1"></div>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded">🔗</button>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded">📷</button>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded">"</button>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded">📊</button>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded">↶</button>
                                <button type="button" class="p-1 hover:bg-gray-200 rounded">↷</button>
                            </div>
                            <!-- Text Area -->
                            <textarea id="description" name="description" rows="8" placeholder="Enter Description"
                                class="w-full px-3 py-2 border-0 focus:outline-none focus:ring-0 resize-none placeholder-gray-400"></textarea>
                        </div> --}}
                        {{-- <div class="w-1/2 h-fll">
                            <label for="">Image</label>
                            <div class="w-full h-full bg-red-700">
                                <label for="img" class="w-full h-full bg-blue-800 flex justify-center">
                                    <img src="" alt="">
                                </label>
                                <input type="file" name="img" class="preview" id="img" onchange="previewImg(this)">
                            </div>
                        </div> --}}
                        <div class="w-1/2 mx-auto bg-white rounded-lg shadow-sm p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Upload Image</h2>

                            <!-- Upload Area -->
                            <div class="relative">


                                <!-- Thumbnail Preview Area -->
                                <div id="thumbnailContainer"
                                    class="border-2 border-dashed w-full border-gray-300 rounded-lg p-8 text-center hover:border-blue-400 transition-colors duration-200">
                                    <!-- Default Upload Icon -->
                                    {{-- <div id="uploadPlaceholder" class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="text-gray-500 text-sm mb-2">Click to upload or drag and drop</p>
                                        <p class="text-gray-400 text-xs">PNG, JPG, GIF up to 10MB</p>
                                    </div> --}}
                                    <input type="file" accept="image/*" name="image"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                        onchange="previewImg(this)">

                                    <!-- Image Preview (hidden by default) -->
                                    <div id="imagePreview" class="">
                                        <img id="img-preview" src="" alt="Preview"
                                            class="w-full h-full object-cover rounded-lg mb-4">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p id="fileName" class="text-sm font-medium text-gray-700"></p>
                                                <p id="fileSize" class="text-xs text-gray-500"></p>
                                            </div>
                                            <button onclick="removeImage()"
                                                class="text-red-500 hover:text-red-700 transition-colors duration-200"
                                                type="button">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Button -->
                            {{-- <button id="uploadButton"
                                class="w-full mt-6 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                disabled>
                                Upload Image
                            </button> --}}
                        </div>
                        <div class="w-1/2 h-full">
                            <label for="" class="block text-sm font-medium text-gray-700 mb-2">description</label>
                            <textarea name="description" rows="" cols="" id=""
                                class="w-full h-50 block border-2 rounded-md border-gray-400 shadow-md p-5" placeholder="description here....."></textarea>
                        </div>


                    </div>

                    <!-- Category, Status, Visibility, Language Row -->

                    <!-- Submit Button -->
                    <div class="flex justify-end pt-6">
                        <button type="button" onclick="createCate('#frm-create-courses')"
                            class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            Create Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection