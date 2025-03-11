<!-- resources/views/ads/create.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Create Ad</title>
</head>

<body>
    <h1>Create New Ad</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Name:</label><br>
        <!-- Name Field -->
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Ad Name" required>
        @error('name') <p class="error">{{ $message }}</p> @enderror

        <label>Description:</label><br>
        <!-- Description Field -->
        <textarea name="description" placeholder="Description" required>{{ old('description') }}</textarea>
        @error('description') <p class="error">{{ $message }}</p> @enderror

        <label>Price:</label><br>
        <!-- Price Field -->
        <input type="number" name="price" value="{{ old('price') }}" placeholder="Price" step="0.01" required>
        @error('price') <p class="error">{{ $message }}</p> @enderror

        <label>Photos (up to 5):</label><br>
        <!-- File Upload -->
        <input type="file" name="photos[]" id="photos" multiple accept="image/*">
        @error('photos') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">Create Ad</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let fileInput = document.getElementById('photos');

            fileInput.addEventListener('change', function(event) {
                localStorage.setItem('selectedPhotos', JSON.stringify([...event.target.files].map(file => file.name)));
            });

            // Restore selected files on page load
            let savedPhotos = JSON.parse(localStorage.getItem('selectedPhotos') || '[]');
            if (savedPhotos.length > 0) {
                
            }
        });
    </script>
</body>

</html>