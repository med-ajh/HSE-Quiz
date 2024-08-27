<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.quiz_instructions') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .info-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
            background-color: #ffffff;
        }
        .info-card h5 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }
        .info-card p {
            font-size: 1rem;
            color: #555;
        }
        .info-card ul {
            margin: 0;
            padding-left: 20px;
        }
        .info-card ul li {
            margin-bottom: 10px;
            color: #666;
        }
        .btn-primary {
            margin-top: 20px;
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004494;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card info-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('messages.quiz_instructions') }}</h5>
                        <p>{{ __('messages.quiz_description') }}</p>
                        <h6>{{ __('messages.questions_format') }}</h6>
                        <ul>
                            <li>{{ __('messages.question_format_1') }}</li>
                            <li>{{ __('messages.question_format_2') }}</li>
                            <li>{{ __('messages.question_format_3') }}</li>
                        </ul>
                        <a href="{{ route('visitor.questions') }}" class="btn btn-primary">{{ __('messages.start_quiz') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
