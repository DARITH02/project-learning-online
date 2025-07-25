@extends('app.app')
@section('contents')

    <div class="w-full px-7 mx-auto">
        <!-- Upload Area -->
        <div class="flex w-full items-center">
            <a href="{{route('viewCourses')}}"
                class=" block w- cursor-pointer hover:bg-gray-500 duration-200  px-3 py-2 my-2 rounded-md"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-circle-arrow-left-icon lucide-circle-arrow-left">
                    <circle cx="12" cy="12" r="10" />
                    <path d="m12 8-4 4 4 4" />
                    <path d="M16 12H8" />
                </svg>
            </a>
            <x-headding-page class="block w-full">
                <x-slot name='headding'>Lession</x-slot>
                <x-slot name='title1'>lession</x-slot>
                <x-slot name='title2'>Create</x-slot>
            </x-headding-page>
        </div>
        <div class="bg-mode rounded-xl shadow p-6">
            <form action="" id="frm-lession" data-url="{{route('create-lession.store')}} ">
                <div
                    class="border-2 border-dashed rounded-lg p-8 text-center transition-colors border-muted-foreground/25 hover:border-muted-foreground/50">
                    <label for="videos" class="cursor-pointer flex flex-col items-center gap-4">
                        <div class="p-4 rounded-full">
                            <!-- Upload Icon -->
                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12V4m0 0L8 8m4-4l4 4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Upload Videos</h3>
                            <p class="text-sm text-gray-500">Drag and drop images here, or click to select files</p>
                            <p class="text-xs text-gray-400 mt-1">Maximum 20 files, up to 100MB each</p>
                        </div>
                        <label id="drop-area" for="videos"
                            class="inline-flex gap-2.5 items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <!-- Image Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-upload-icon lucide-upload">
                                <path d="M12 3v12" />
                                <path d="m17 8-5-5-5 5" />
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            </svg>
                            Select Videos
                        </label>
                        <input onchange="window.changeVideoPreview(this)" type="file" name="videos[]" id="videos" multiple
                            accept="video/*">
                    </label>

                </div>
                <div class="w-full mt-3.5 flex gap-3">
                    <div class="w-1/2">

                        <label for="">Select course</label>
                        <select onchange="getModule(this.value)" name="course" id="course"
                            class=" py-2.5 border-2 border-gray-200 rounded-md w-full px-3.5">
                            <option value="" hidden>Please select course</option>
                            @foreach ($course as $data)
                                <option value="{{$data['id']}}">{{$data['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2">

                        <label for="">Select Module</label>
                        <select name="module" id="module" class=" py-2.5 border-2 border-gray-200 rounded-md w-full px-3.5">
                            <option value="" hidden>Please select course</option>

                        </select>
                    </div>
                </div>

            </form>
        </div>

        <!-- Image Previews -->
        <div class="rounded-xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
                {{-- <h3 class="text-lg font-semibold">Selected Images (2/5)</h3> --}}
                <p id="video-count" class="text-sm mt-2"></p>

                <div class="flex gap-2">
                    <button type="button" onclick="uploadMultipleImages('#frm-lession')"
                        class="px-4 py-2 bg-blue-600 rounded-md text-sm hover:bg-blue-700 cursor-pointer">
                        Upload All
                    </button>
                    <button onclick="clearFrmVideos('#frm-lession','#course')"
                        class="cursor-pointer px-4 py-2 border border-gray-300 rounded-md text-sm hover:bg-gray-50">
                        Clear All
                    </button>
                </div>
            </div>

            <div id="video-preview" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Example Image Preview -->
                {{-- <div class="relative group">
                    {{-- <div class="aspect-square relative overflow-hidden rounded-lg border"> --}}
                        {{-- <img src="/placeholder.svg" alt="example.jpg" class="object-cover w-full h-full" />
                        <button
                            class="absolute top-2 right-2 h-6 w-6 p-0 rounded-full bg-red-600 text-white text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                            ✕
                        </button>
                    </div>
                    <div class="mt-2 space-y-1">
                        <p class="text-xs font-medium truncate" title="example.jpg">example.jpg</p>
                        <p class="text-xs text-gray-400">1.23 MB</p>

                        <!-- Simulated Upload Progress -->
                        <div class="space-y-1">
                            <div class="bg-gray-200 rounded h-1">
                                <div class="bg-blue-500 h-1 rounded w-2/3"></div>
                            </div>
                            <p class="text-xs text-gray-400">66%</p>
                        </div>

                        <!-- Uploaded State -->
                        <!-- <p class="text-xs text-green-600 font-medium">✓ Uploaded</p> -->
                    </div> --}}
                    {{--
                </div> --}}
                <!-- Repeat for more images -->
            </div>
        </div>
    </div>




@endsection