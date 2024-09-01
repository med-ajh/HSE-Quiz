<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation Video</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Watch the Formation Video</h1>
        <video controls class="w-100">
            <source src="{{ $videoPath }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <a href="{{ route('contractor.quiz', $formationId) }}" class="btn btn-primary mt-3">Start Quiz</a>
    </div>
</body>
</html>
