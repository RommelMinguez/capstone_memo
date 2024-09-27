<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md">
        @if(session('success'))
            <div class="mt-4 text-green-600">{{ session('success') }}</div>
            <div>{{ session('path') }}</div>
            <img src="/storage/{{ session('path') }}" alt="upload">
        @endif
        <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block mb-2 text-sm font-medium text-gray-700">Upload an image:</label>
            <input type="file" id="imageInput" name="image" accept="image/*" class="mb-4 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring focus:ring-blue-500" />
            <img id="imagePreview" src="" alt="Image Preview" class="hidden w-full h-auto rounded-md shadow-md" />
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
        </form>
    </div>

    <script>
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.src = event.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
