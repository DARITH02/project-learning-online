@extends('app.app')
@section('contents')
    <div class="px-7">
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
                <x-slot name='headding'>Modules</x-slot>
                <x-slot name='title1'>modules</x-slot>
                <x-slot name='title2'>Create</x-slot>
            </x-headding-page>
        </div>

        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Courses</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modules</th>
                    {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Students</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    --}}
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Module Row 1 -->

                <tr class="hover:bg-gray-50 ">

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
                                <div class="h-12 w-12 rounded-lg bg-blue-100 flex items-center justify-center">
                                    {{-- <i class="fas fa-code text-blue-600"></i> --}}
                                    <img src="{{asset('storage/' . $module->thumbnail)}}" alt="">
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $module->title }}
                                </div>
                            </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap " colspan="2">
                        {{-- <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Programming
                        </span> --}}
                        <ul class="flex flex-col flex-wrap gap-2">
                            @foreach ($module->modules as $data)
                                <li
                                    class="text-sm text-blue-500 flex category-row-{{$data->id}} bg-gray-100 px-2.5 py-1 justify-between cursor-pointer">
                                    {{-- data-?title --}}
                                    <span class="txt-title">
                                        {{ $data->title }}
                                    </span>
                                    <ul class="flex flex-col">
                                        <li class="flex gap-2 text-xs">
                                            <button onclick="showModalModule ({{$data->id}},'{{$data->title}}')"
                                                class="text-blue-700 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-square-pen-icon lucide-square-pen">
                                                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                    <path
                                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                                </svg></button>
                                            <button onclick="deleteItem('/delete-module/',{{$data->id}})"
                                                class="text-rose-800 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-trash-icon lucide-trash">
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                                    <path d="M3 6h18" />
                                                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                </svg></button>
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </td>

                </tr>
            </tbody>
            {{-- <button onclick="openPopup()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Open Popup
            </button> --}}

        </table>
        <form id="update-module" data-url="/update-module" class="w-full flex py-4 px-7">
            <div class="flex justify-end w-full gap-3.5">
                <input type="hidden" class="id_module" name="id" />
                <input type="text" name="title" class="update_module px-4 py-2 border border-gray-300 rounded-lg " />
                <button type="button"
                    class="px-3 inline rounded-md uppercase text-xs bg-green-700 text-white font-bold cursor-pointer"
                    onclick="udpateCate('#update-module')">update</button>
            </div>
        </form>

        {{-- <div id="popup" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
            <!-- Modal Content -->
            <div class="bg-white max-w-md w-full p-6 rounded-xl shadow-lg relative transform transition-all duration-300 scale-95 opacity-0"
                id="popupContent">
                <!-- Close Button -->
                <button onclick="closePopup()"
                    class="absolute top-2 right-3 text-gray-400 text-xl hover:text-red-500">&times;</button>
                <h2 class="text-xl font-bold mb-2">Popup Title</h2>
                <p class="text-gray-600">This modal uses only Tailwind classes. No config required.</p>
            </div>
        </div> --}}
    </div>
    <script>
        function openPopup() {
            const popup = document.getElementById('popup');
            const content = document.getElementById('popupContent');
            popup.classList.remove('hidden');
            // Start animation
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10); // tiny delay to trigger transition
        }

        function closePopup() {
            const popup = document.getElementById('popup');
            const content = document.getElementById('popupContent');
            // Animate out
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            // Hide after transition
            setTimeout(() => {
                popup.classList.add('hidden');
            }, 300);
        }
    </script>



@endsection