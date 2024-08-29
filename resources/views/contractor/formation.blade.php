<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Formation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Select a Formation</h1>
        <ul class="list-group">
            @foreach($formations as $formation)
                <li class="list-group-item">
                    <a href="{{ route('contractor.video', $formation->id) }}">{{ $formation->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
