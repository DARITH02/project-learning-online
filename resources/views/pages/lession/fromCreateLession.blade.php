@extends('app.app')
@section('contents')
  <div class="min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center text-indigo-700">📤 Upload Multiple Images</h2>

        {{-- Upload area --}}
        <div 
            id="dropZone"
            class="w-full p-8 border-4 border-dashed border-indigo-300 rounded-lg text-center text-gray-600 cursor-pointer hover:bg-indigo-50 transition"
            onclick="document.getElementById('fileInput').click()"
            ondragover="event.preventDefault(); this.classList.add('bg-indigo-100')"
            ondragleave="this.classList.remove('bg-indigo-100')"
            ondrop="handleDrop(event)"
        >
            <p class="text-lg">Drag and drop images here or click to select</p>
            <input type="file" id="fileInput" accept="image/*" multiple class="hidden" />
        </div>

        {{-- Preview Grid --}}
        <div id="previewContainer" class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6"></div>
    </div>
</div>

<script>
    const fileInput = document.getElementById('fileInput');
    const previewContainer = document.getElementById('previewContainer');

    fileInput.addEventListener('change', function () {
        previewImages(this.files);
    });

    function handleDrop(event) {
        event.preventDefault();
        document.getElementById('dropZone').classList.remove('bg-indigo-100');
        const files = event.dataTransfer.files;
        fileInput.files = files; // Optional: sync input with drop
        previewImages(files);
    }

    function previewImages(files) {
        previewContainer.innerHTML = ''; // clear existing previews
        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                const imageCard = document.createElement('div');
                imageCard.className = 'relative border rounded-md shadow hover:shadow-lg overflow-hidden transition';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-48 object-cover';

                const name = document.createElement('div');
                name.textContent = file.name;
                name.className = 'text-sm p-2 truncate text-center bg-gray-100';

                imageCard.appendChild(img);
                imageCard.appendChild(name);
                previewContainer.appendChild(imageCard);
            };
            reader.readAsDataURL(file);
        });
    }
</script>
@endsection