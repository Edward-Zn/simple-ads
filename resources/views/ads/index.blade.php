@foreach ($ads as $ad)
    <h2>{{ $ad->name }} - ${{ $ad->price }}</h2>
    <p>{{ $ad->description }}</p>
    @foreach (json_decode($ad->photos) as $photo)
        <img src="{{ asset('storage/' . $photo) }}" width="100">
    @endforeach
@endforeach