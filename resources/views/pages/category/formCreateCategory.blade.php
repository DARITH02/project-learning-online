@extends('app.app')
@section('contents')

    <div class="w-full p-8">
        <div class="flex w-full items-center">
            <a href="{{route('viewcategory')}}"
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
                <x-slot name='headding'>Category</x-slot>
                <x-slot name='title1'>category</x-slot>
                <x-slot name='title2'>Create</x-slot>
            </x-headding-page>
        </div>

        <div class="bg-mode mx-auto rounded-lg shadow-sm p-7">
            <form id="form-crategory" class="space-y-6" data-url="{{ route('createCategory.store') }}">
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
                    <button onclick="createCate('#form-crategory')" type="button"
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
            </form>

        </div>
    </div>
    <script>
        // function add(){
        //     alert(67890)
        // }

        // When you insert the page via AJAX:
        // fetch(...).then(response => {
        //     container.innerHTML = response;
        //     const btn = container.querySelector('#btn_cate');
        //     btn?.addEventListener('click', () => {
        //         alert(456789);
        //     });
        // });

    </script>
@endsection