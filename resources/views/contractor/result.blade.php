<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Quiz Result</h1>
        <p>Congratulations, {{ $contractor->first_name }} {{ $contractor->last_name }}!</p>
        <p>Your score: {{ $score }}/10</p>
        <p>You earned {{ $stars }} star(s).</p>

        @if ($score >= 6)
            <a href="{{ route('contractor.formation') }}" class="btn btn-success mt-3">Take Another Test</a>
        @else
            <a href="{{ route('contractor.quiz', $currentFormationId) }}" class="btn btn-warning mt-3">Retake the Quiz</a>
        @endif

        <a href="{{ route('contractor.finish') }}" class="btn btn-danger mt-3">Finish</a>
    </div>
</body>
</html>
