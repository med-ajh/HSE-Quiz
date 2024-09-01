<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Question {{ $questionNumber }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Question {{ $questionNumber }}</h1>
        <p>{{ $questionText }}</p>
        @if ($questionImage)
            <img src="{{ $questionImage }}" alt="Question Image" class="img-fluid mb-3">
        @endif
        <form method="POST" action="{{ route('contractor.submitQuestion', $questionNumber) }}">
            @csrf
            @foreach($options as $key => $option)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="option{{ $key }}" value="{{ $key }}" required>
                    <label class="form-check-label" for="option{{ $key }}">
                        {{ $option }}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-3">Next</button>
        </form>
    </div>
</body>
</html>
