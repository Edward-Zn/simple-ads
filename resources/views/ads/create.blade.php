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
        <input type="text" name="name" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>

        <label>Price:</label><br>
        <input type="number" name="price" step="0.01" required><br><br>

        <label>Photos (up to 5):</label><br>
        <input type="file" name="photos[]" multiple accept="image/*"><br><br>

        <button type="submit">Create Ad</button>
    </form>
</body>

</html>