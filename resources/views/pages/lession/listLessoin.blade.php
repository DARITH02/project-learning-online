@extends('app.app')
@section('contents')
    <div class="max-w-4xl mx-auto px-7 bg-white">
        <!-- Course Preview Type -->
        <div class="space-y-2">
            <label for="preview-type" class="text-base font-medium text-gray-700">Course Preview Type</label>
            <select id="preview-type" class="w-full h-12 text-gray-500 border border-gray-300 rounded-lg px-4">
                <option selected disabled>Select Option</option>
                <option value="video">Video Preview</option>
                <option value="image">Image Preview</option>
                <option value="text">Text Preview</option>
            </select>
        </div>

        <!-- Video URL -->
        <div class="space-y-2">
            <label for="video-url" class="text-base font-medium text-gray-700">Video URL</label>
            <input id="video-url" type="url" placeholder="https://youtu.be/3i6Q4QL-J4Q"
                class="h-12 w-full px-4 text-gray-500 placeholder:text-gray-400 border border-gray-300 rounded-lg" />
        </div>

        <!-- Thumbnail -->
        <div class="space-y-2">
            <label class="text-base font-medium text-gray-700">Thumbnail</label>

            <!-- File Upload -->
            <div class="relative">
                <input type="file" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                <div
                    class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center hover:border-gray-400 transition-colors">
                    <div class="flex flex-col items-center justify-center space-y-4">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                            <!-- ImageIcon Placeholder -->
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm4 10l2.586-2.586a2 2 0 012.828 0L16 16m-1-5a1 1 0 100-2 1 1 0 000 2z" />
                            </svg>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-500">
                            <!-- Upload Icon Placeholder -->
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4-4m0 0l-4 4m4-4v12" />
                            </svg>
                            <span>Click to upload thumbnail</span>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-sm text-gray-500">NB : Thumbnail size will be 600px x 600px and not more than 1MB</p>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between pt-6">
            <button
                class="px-8 py-3 bg-indigo-600 text-white border border-indigo-600 hover:bg-indigo-700 hover:border-indigo-700 rounded-lg">
                Back
            </button>
            <button class="px-8 py-3 bg-indigo-600 text-white hover:bg-indigo-700 rounded-lg">
                Next
            </button>
        </div>
    </div>


 <script src="{{ asset('js/loadingPage.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection