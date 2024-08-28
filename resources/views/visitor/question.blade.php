<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Question {{ $questionNumber }}</h5>
                        <p>{{ $questionText }}</p>
                        <form action="{{ route('visitor.submit-question', ['questionNumber' => $questionNumber]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                @foreach($options as $optionKey => $optionText)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="option{{ $optionKey }}" value="{{ $optionKey }}" required>
                                        <label class="form-check-label" for="option{{ $optionKey }}">
                                            {{ $optionKey }}) {{ $optionText }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit Answer</button>
                        </form>
                        <a href="{{ route('visitor.question', ['questionNumber' => $questionNumber + 1]) }}" class="btn btn-secondary mt-3">Next Question</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
