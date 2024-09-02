<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $formation['name'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $formation['name'] }}</h1>
        <img src="{{ asset('storage/' . $formation['image']) }}" class="img-fluid" alt="{{ $formation['name'] }}">
        <video controls class="w-100 mt-3">
            <source src="{{ asset('storage/videos/' . $formation['video']) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <a href="{{ route('contractor.showQuiz', $formation['id']) }}" class="btn btn-primary mt-3">Start Quiz</a>
    </div>
</body>
</html>
