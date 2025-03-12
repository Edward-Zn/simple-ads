<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Ads List</title>
</head>

<body>
    <div class="container">
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
                <img src="{{ asset('storage/' . $photo) }}" alt="Ad Image" width="100" height="100" style="object-fit: cover; border-radius: 5px;">
                @endforeach
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>