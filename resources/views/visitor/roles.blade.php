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
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 165, 0, 0.2), rgba(255, 255, 255, 0));
            animation: backgroundAnimation 15s ease infinite;
            z-index: -1;
        }
        @keyframes backgroundAnimation {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }
        .container {
            width: 100%;
            max-width: 700px;
        }
        .info-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            padding: 30px;
            background: #ffffff;
            position: relative;
            overflow: hidden;
            animation: cardAnimation 1s ease-in-out;
        }
        @keyframes cardAnimation {
            0% { transform: scale(0.95); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .info-card:before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 100%;
            height: 100%;
            background: rgba(255, 165, 0, 0.1);
            border-radius: 20px;
            z-index: 0;
            transform: rotate(-10deg);
            filter: blur(30px);
        }
        .info-card h5 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
            z-index: 1;
            position: relative;
        }
        .info-card p {
            font-size: 1.15rem;
            color: #555;
            margin-bottom: 20px;
            z-index: 1;
            position: relative;
        }
        .info-card h6 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #444;
            z-index: 1;
            position: relative;
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
            border: none; /* Ensure no border is applied */
            border-radius: 50%;
            color: white;
            font-size: 2rem;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
            position: relative;
            text-decoration: none; /* Remove any text underline */
            line-height: 0; /* Ensure there's no extra line height */
        }
        .btn-icon:hover {
            background-color: #e65100; /* Darker orange */
            transform: scale(1.1);
        }
        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="background-animation"></div>
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
                        <div class="btn-container">
                            <a href="{{ route('visitor.question', ['questionNumber' => 1]) }}" class="btn-icon">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Audio for button click -->
    <audio id="click-sound" src="path/to/your-sound-file.mp3" preload="auto"></audio>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.querySelector('.btn-icon');
            const clickSound = document.getElementById('click-sound');
            
            button.addEventListener('click', function() {
                clickSound.play();
            });
        });
    </script>
</body>
</html>
