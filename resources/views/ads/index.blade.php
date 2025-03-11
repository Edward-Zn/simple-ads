<!DOCTYPE html>
<html>

<head>
    <title>Ads List</title>
</head>

<body>
    <h1>Ads List</h1>

    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('ads.create') }}">Create New Ad</a>

    <ul>
        @foreach($ads as $ad)
        <li>
            <h2>{{ $ad->name }}</h2>
            <p>{{ $ad->description }}</p>
            <p>Price: ${{ $ad->price }}</p>

            @if($ad->photos)
            @php
                $photos = json_decode($ad->photos, true);
            @endphp
            @foreach ($photos as $photo)
                <img src="{{ asset('storage/' . $photo) }}" alt="Ad Photo" width="150">
            @endforeach
            @endif
        </li>
        @endforeach
    </ul>
</body>

</html>