@extends('app.app')
@section('contents')
    <div class="min-h-screen p-8">
        <div class="max-w-7xl mx-auto space-y-12">

            <!-- Buttons Section -->
            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Buttons</h2>
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex flex-wrap gap-4">
                        <!-- Primary Buttons -->
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
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
                        <p class="text-gray-600 mb-4">This is a basic card with some content.</p>
                        <button class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                            Action
                        </button>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <img src="/placeholder.svg?height=160&width=300" alt="Course" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Course Card</h3>
                            <p class="text-gray-600 text-sm mb-3">Course description...</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">⭐ 4.8 (120)</span>
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
                        <span
                            class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                        <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Inactive</span>
                        <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded">Programming</span>
                        <span class="px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded">Design</span>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection