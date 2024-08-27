<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Questions') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .question-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .question-card h5 {
            font-size: 1.25rem;
            margin-bottom: 15px;
        }
        .question-card img {
            max-width: 100%;
            border-radius: 8px;
        }
        .btn-primary {
            margin-top: 20px;
        }
        .form-check {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $question->text }}</h5>

                        @if($question->image)
                            <img src="{{ asset('images/' . $question->image) }}" alt="Question Image">
                        @endif

                        <form action="{{ route('visitor.submit-answer', ['question' => $question->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                @foreach($question->answers as $answer)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="answer{{ $answer->id }}" value="{{ $answer->id }}" required>
                                        <label class="form-check-label" for="answer{{ $answer->id }}">
                                            {{ $answer->text }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Next Question') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
