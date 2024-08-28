<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.quiz_instructions') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0e5e8, #f4f7f6);
            font-family: 'Roboto', sans-serif;
            color: #333;
            padding: 20px;
        }
        .container {
            margin-top: 30px;
        }
        .info-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            padding: 25px;
            background-color: #ffffff;
            max-width: 700px;
            margin: 0 auto;
        }
        .info-card h5 {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #333;
        }
        .info-card p {
            font-size: 1.15rem;
            color: #555;
            margin-bottom: 20px;
        }
        .info-card h6 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #444;
        }
        .info-card ul {
            margin: 0;
            padding-left: 20px;
        }
        .info-card ul li {
            margin-bottom: 10px;
            color: #666;
            font-size: 1.1rem;
        }
        .btn-icon {
            background-color: #ff6f00; /* Orange color */
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 2rem;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-icon:hover {
            background-color: #e65100; /* Darker orange */
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
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
                        <a href="{{ route('visitor.question', ['questionNumber' => 1]) }}" class="btn-icon">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
