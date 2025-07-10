@extends('app.app')
@section('contents')

    <div class="mx-auto p-6 space-y-6 bg-mode ">
        {{-- <div class="text-center space-y-2">
            <h1 class="text-3xl font-bold">Create New Module</h1>
            <p class="text-gray-500">Add a new module to your learning platform</p>
        </div> --}}

        <div class="flex w-full items-center">
            <a href="{{route('modules.index')}}"
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
                <x-slot name='headding'>Modules</x-slot>
                <x-slot name='title1'>modules</x-slot>
                <x-slot name='title2'>Create</x-slot>
            </x-headding-page>
        </div>




        <form method="" id="frm-module-create" data-url="{{route('create-module.store')}}">


            {{-- Basic Information --}}
            <div class="bg-mode w-5/6 m-auto shadow rounded-lg p-6 space-y-4">
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M13 16h-1v-4h-1m1-4h.01M12 6.5a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11z" />
                    </svg>
                    Basic Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="title" class="block text-sm font-medium">Module Title *</label>
                        <input type="text" name="title" id="title" class="mt-1 w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label for="code" class="block text-sm font-medium">Module Code</label>
                        <input type="text" name="code" id="code" class="mt-1 w-full border rounded px-3 py-2">
                    </div>
                </div>

                {{-- <div>
                    <label for="description" class="block text-sm font-medium">Description *</label>
                    <textarea name="description" id="description" class="mt-1 w-full border rounded px-3 py-2 min-h-[100px]"
                        required></textarea>
                </div> --}}

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="courses" class="block text-sm font-medium">Courses *</label>
                        <select name="course" id="course" class="mt-1 w-full border rounded px-3 py-2" required>
                            <option value="" dis>Select category</option>

                            @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->title}}
                                </option>

                            @endforeach


                            {{-- <option value="design">Design</option>
                            <option value="business">Business</option>
                            <option value="marketing">Marketing</option>
                            <option value="data-science">Data Science</option>
                            <option value="other">Other</option> --}}
                        </select>
                    </div>

                    {{-- <div>
                        <label for="difficulty" class="block text-sm font-medium">Difficulty</label>
                        <select name="difficulty" id="difficulty" class="mt-1 w-full border rounded px-3 py-2">
                            <option value="">Select difficulty</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                            <option value="expert">Expert</option>
                        </select>
                    </div>

                    <div>
                        <label for="duration" class="block text-sm font-medium">Duration (hours)</label>
                        <input type="number" name="duration" id="duration" min="0" step="0.5"
                            class="mt-1 w-full border rounded px-3 py-2">
                    </div> --}}
                </div>
                <div class="mt-5 flex gap-5">
                    <button type="button" onclick="createCate('#frm-module-create')"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Save
                    </button>
                    <button type="button"
                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 focus:outline-hidden focus:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
                        Cancle
                    </button>
                </div>

            </div>

            {{-- Prerequisites --}}
            {{-- <div class="bg-white shadow rounded-lg p-6 space-y-4">
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 20l9-5-9-5-9 5 9 5z" />
                    </svg>
                    Prerequisites
                </h2>
                <div class="flex gap-2">
                    <input type="text" id="prerequisite-input" placeholder="Add prerequisite..."
                        class="w-full border rounded px-3 py-2">
                    <button type="button" onclick="addPrerequisite()"
                        class="bg-blue-600 text-white px-3 py-2 rounded">Add</button>
                </div>
                <div id="prerequisite-tags" class="flex flex-wrap gap-2 mt-2"></div>
            </div> --}}

            {{-- Tags --}}
            {{-- <div class="bg-white shadow rounded-lg p-6 space-y-4">
                <h2 class="text-xl font-semibold">Tags</h2>
                <div class="flex gap-2">
                    <input type="text" id="tag-input" placeholder="Add tag..." class="w-full border rounded px-3 py-2">
                    <button type="button" onclick="addTag()" class="bg-blue-600 text-white px-3 py-2 rounded">Add</button>
                </div>
                <div id="tag-list" class="flex flex-wrap gap-2 mt-2"></div>
            </div> --}}

            {{-- Settings --}}
            {{-- <div class="bg-white shadow rounded-lg p-6 space-y-4">
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 4v2m0 12v2m8-8h2M4 12H2m15.364-6.364l1.414 1.414M6.222 17.778l1.414-1.414M17.778 17.778l-1.414-1.414M6.222 6.222L4.808 7.636" />
                    </svg>
                    Settings
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="flex justify-between items-center">
                            <span>Published</span>
                            <input type="checkbox" name="published" class="toggle-switch">
                        </label>
                        <label class="flex justify-between items-center">
                            <span>Featured</span>
                            <input type="checkbox" name="featured" class="toggle-switch">
                        </label>
                        <label class="flex justify-between items-center">
                            <span>Certificate Available</span>
                            <input type="checkbox" name="certificate" class="toggle-switch">
                        </label>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <label for="instructor" class="block text-sm font-medium">Instructor</label>
                            <input type="text" name="instructor" id="instructor"
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-medium">Price ($)</label>
                            <input type="number" name="price" id="price" min="0" step="0.01"
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label for="max-students" class="block text-sm font-medium">Max Students</label>
                            <input type="number" name="max_students" id="max-students" min="1"
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- Hidden Inputs for Tags & Prerequisites --}}
            {{-- <input type="hidden" name="tags" id="tags-hidden">
            <input type="hidden" name="prerequisites" id="prerequisites-hidden"> --}}

            {{-- Actions --}}
            {{-- <div class="flex justify-between mt-6 gap-4">
                <button type="button" class="flex-1 border px-4 py-2 rounded">Save as Draft</button>
                <button type="submit" class="flex-1 bg-blue-600 text-white px-4 py-2 rounded">Create Module</button>
            </div> --}}





        </form>
    </div>

    {{-- Scripts --}}
    <script>
        let tags = []
        let prerequisites = []

        function addTag() {
            const input = document.getElementById('tag-input')
            const value = input.value.trim()
            if (value && !tags.includes(value)) {
                tags.push(value)
                renderTags()
                input.value = ''
            }
        }

        function removeTag(tag) {
            tags = tags.filter(t => t !== tag)
            renderTags()
        }

        function renderTags() {
            const container = document.getElementById('tag-list')
            container.innerHTML = ''
            tags.forEach(tag => {
                container.innerHTML += `
                                                                            <span class="bg-gray-200 text-sm px-2 py-1 rounded flex items-center gap-1">
                                                                              ${tag}
                                                                              <button type="button" onclick="removeTag('${tag}')" class="text-red-500">×</button>
                                                                            </span>`
            })
            document.getElementById('tags-hidden').value = JSON.stringify(tags)
        }

        function addPrerequisite() {
            const input = document.getElementById('prerequisite-input')
            const value = input.value.trim()
            if (value && !prerequisites.includes(value)) {
                prerequisites.push(value)
                renderPrerequisites()
                input.value = ''
            }
        }

        function removePrerequisite(p) {
            prerequisites = prerequisites.filter(item => item !== p)
            renderPrerequisites()
        }

        function renderPrerequisites() {
            const container = document.getElementById('prerequisite-tags')
            container.innerHTML = ''
            prerequisites.forEach(p => {
                container.innerHTML += `
                                                                            <span class="bg-gray-200 text-sm px-2 py-1 rounded flex items-center gap-1">
                                                                              ${p}
                                                                              <button type="button" onclick="removePrerequisite('${p}')" class="text-red-500">×</button>
                                                                            </span>`
            })
            document.getElementById('prerequisites-hidden').value = JSON.stringify(prerequisites)
        }

        function handleSubmit(e) {
            document.getElementById('tags-hidden').value = JSON.stringify(tags)
            document.getElementById('prerequisites-hidden').value = JSON.stringify(prerequisites)
        }
    </script>


@endsection