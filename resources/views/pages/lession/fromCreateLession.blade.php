@extends('app.app')
@section('contents')
    <div class="w-full px-7 mx-auto">
        <!-- Navigation + Heading -->
        <div class="flex w-full items-center">
            <a href="{{ route('viewCourses') }}"
                class="block cursor-pointer hover:bg-gray-500 duration-200 px-3 py-2 my-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-circle-arrow-left-icon">
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

        <!-- Upload form -->
        <div class="bg-mode rounded-xl shadow p-6">
            <form id="frm-lession" action="{{ route('create-lession.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div id="drop-area"
                    class="border-2 border-dashed rounded-lg p-8 text-center transition-colors border-muted-foreground/25 hover:border-muted-foreground/50 cursor-pointer">
                    <label for="videos" class="flex flex-col items-center gap-4 cursor-pointer select-none">
                        <div class="p-4 rounded-full">
                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12V4m0 0L8 8m4-4l4 4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Upload Videos or Images</h3>
                            <p class="text-sm text-gray-500">Click to select files or drag and drop</p>
                            <p class="text-xs text-gray-400 mt-1">Maximum 100 files, up to 100MB each</p>
                        </div>
                        <input hidden type="file" name="videos[]" id="videos" multiple accept="video/*,image/*" />
                    </label>
                </div>

                <div class="w-full mt-3.5 flex gap-3">
                    <div class="w-1/2">
                        <label for="course">Select course</label>
                        <select onchange="getModule(this.value)" name="course" id="course"
                            class="py-2.5 border-2 border-gray-200 rounded-md w-full px-3.5" required>
                            <option value="" hidden>Please select course</option>
                            @foreach ($course as $data)
                                <option value="{{ $data['id'] }}">{{ $data['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="module">Select Module</label>
                        <select name="module" id="module"
                            class="py-2.5 border-2 border-gray-200 rounded-md w-full px-3.5" required>
                            <option value="" hidden>Please select module</option>
                        </select>
                    </div>
                </div>

                <button type="button" onclick="upload()"
                    class="mt-6 px-4 py-2 bg-blue-600 rounded-md text-white text-sm hover:bg-blue-700 cursor-pointer">
                    Submit
                </button>
            </form>
        </div>

        <!-- Preview area -->
        <div class="rounded-xl shadow p-6 mt-6">
            <div class="flex items-center justify-between mb-4">
                <p id="video-count" class="text-sm mt-2">Selected files under 100MB: 0</p>
                <button type="button" onclick="clearVideos()"
                    class="cursor-pointer px-4 py-2 border border-gray-300 rounded-md text-sm hover:bg-gray-50">
                    Clear All
                </button>
            </div>

            <div id="video-preview" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0"></div>
        </div>
    </div>

    <script>
        const notyf = new Notyf({
            duration: 1000,
            position: {
                x: 'right',
                y: 'top',
            },
            types: [{
                    type: 'warning',
                    background: 'orange',
                    icon: {
                        className: 'material-icons',
                        tagName: 'i',
                        text: 'warning'
                    }
                },
                {
                    type: 'error',
                    background: 'indianred',
                    duration: 5000,
                    dismissible: true
                }
            ]
        });

        function upload() {
            const form = document.getElementById('frm-lession');
            const submitBtn = form.querySelector('button[type="button"]');
            const formData = new FormData(form);

            submitBtn.disabled = true;
            submitBtn.innerText = 'Uploading...';

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    },

                    credentials: 'same-origin'
                })
                .then(response => {
                    if (!response.ok) throw new Error('Upload failed');
                    return response.json(); // or .text() if you return string response
                })
                .then(data => {

                    notyf.success({
                        message: 'Upload success!',
                        duration: 9000,
                       
                    });
                    clearVideos()
                    console.log(data);
                    // Optional: Reset form or redirect
                    form.reset();
                })
                .catch(error => {
                    console.log(error);

                    notyf.error(`${error}`);

                    console.error(error);
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerText = 'Submit';
                });
        }



        window.selectedVideos = new Map();

        window.changeVideoPreview = function(input) {
            const previewContainer = document.getElementById("video-preview");
            const files = input.files || input;

            [...files].forEach((file) => {
                const fileKey = `${file.name}_${file.size}`;
                // Accept only videos or images
                if (!file.type.startsWith("video/") && !file.type.startsWith("image/")) return;
                if (file.size > 100 * 1024 * 1024) {
                    notyf.error(`"${file.name}" is too large. Maximum 100MB allowed.`);
                    return;
                }
                if (window.selectedVideos.has(fileKey)) return;

                window.selectedVideos.set(fileKey, file);

                const reader = new FileReader();

                reader.onload = (e) => {
                    const container = document.createElement("div");
                    container.className = "relative group";

                    const aspectDiv = document.createElement("div");
                    aspectDiv.className = "aspect-square relative overflow-hidden rounded-lg border";

                    // Create video or image element depending on file type
                    const mediaElement = file.type.startsWith("video/") ?
                        document.createElement("video") :
                        document.createElement("img");

                    mediaElement.src = e.target.result;

                    if (file.type.startsWith("video/")) {
                        mediaElement.controls = true;
                    }

                    mediaElement.className = "object-cover w-full h-full";

                    const removeBtn = document.createElement("button");
                    removeBtn.className =
                        "absolute top-2 right-2 h-6 w-6 p-0 rounded-full bg-red-600 text-white text-xs opacity-0 group-hover:opacity-100 transition-opacity";
                    removeBtn.textContent = "✕";
                    removeBtn.onclick = () => {
                        container.remove();
                        window.selectedVideos.delete(fileKey);
                        updateCounter();
                    };

                    aspectDiv.appendChild(mediaElement);
                    aspectDiv.appendChild(removeBtn);

                    const infoDiv = document.createElement("div");
                    infoDiv.className = "mt-2 space-y-1";

                    const pName = document.createElement("p");
                    pName.className = "text-xs font-medium truncate";
                    pName.title = file.name;
                    pName.textContent = file.name;

                    const pSize = document.createElement("p");
                    pSize.className = "text-xs text-gray-400";
                    const sizeMB = file.size / (1024 * 1024);
                    pSize.textContent = sizeMB.toFixed(2) + " MB";

                    infoDiv.appendChild(pName);
                    infoDiv.appendChild(pSize);

                    container.appendChild(aspectDiv);
                    container.appendChild(infoDiv);

                    previewContainer.appendChild(container);

                    updateCounter();
                };

                reader.readAsDataURL(file);
            });
        };

        function updateCounter() {
            const counterEl = document.getElementById("video-count");
            const validFiles = [...window.selectedVideos.values()].filter(
                (file) =>
                (file.type.startsWith("video/") || file.type.startsWith("image/")) &&
                file.size <= 100 * 1024 * 1024
            );
            counterEl.textContent = `Selected files under 100MB: ${validFiles.length}`;
        }

        function clearVideos() {
            window.selectedVideos.clear();
            document.getElementById("video-preview").innerHTML = "";
            updateCounter();
            // Also clear the file input value
            document.getElementById("videos").value = "";
        }

        window.setupDragAndDrop = function() {
            const dropArea = document.getElementById("drop-area");
            const fileInput = document.getElementById("videos");
            if (!dropArea || !fileInput) return;

            // Prevent default drag behavior
            ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
                dropArea.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                });
            });

            // Highlight
            ["dragenter", "dragover"].forEach((eventName) => {
                dropArea.addEventListener(eventName, () => {
                    dropArea.classList.add("border-blue-500", "bg-blue-50");
                });
            });

            // Un-highlight
            ["dragleave", "drop"].forEach((eventName) => {
                dropArea.addEventListener(eventName, () => {
                    dropArea.classList.remove("border-blue-500", "bg-blue-50");
                });
            });

            // Handle drop
            dropArea.addEventListener("drop", (e) => {
                window.changeVideoPreview(e.dataTransfer);
            });

            // Click opens file input
            dropArea.addEventListener("click", () => {
                fileInput.click();
            });

            // Handle file input change
            fileInput.addEventListener("change", (e) => {
                window.changeVideoPreview(e.target);
            });
        };

        document.addEventListener("DOMContentLoaded", () => {
            window.setupDragAndDrop();
        });
    </script>
@endsection
