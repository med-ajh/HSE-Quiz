<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $formation['name'] }} - Quiz</h1>
        <form action="{{ route('contractor.submitQuiz', $formation['id']) }}" method="POST">
            @csrf
            @foreach ($formation['questions'] as $index => $question)
                <div class="mb-3">
                    <label>{{ $question['question'] }}</label>
                    <div class="form-check">
                        @foreach ($question['options'] as $option)
                            <input class="form-check-input" type="radio" name="answers[{{ $index + 1 }}]" value="{{ $option }}" id="question{{ $index }}_option{{ $loop->index }}">
                            <label class="form-check-label" for="question{{ $index }}_option{{ $loop->index }}">
                                {{ $option }}
                            </label><br>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>
    </div>
</body>
</html>
