<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Name" required><br>
    <textarea name="description" placeholder="Description" required></textarea><br>
    <input type="number" step="0.01" name="price" placeholder="Price" required><br>
    <input type="file" name="photos[]" accept="image/*" multiple><br>
    <button type="submit">Create Ad</button>
</form>