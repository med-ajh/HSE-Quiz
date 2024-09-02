<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Quiz Result</h1>
        <p>You answered {{ $correctAnswers }} out of 3 questions correctly.</p>
        <a href="{{ route('contractor.finish') }}" class="btn btn-primary">Finish and Print Badge</a>
    </div>
</body>
</html>
