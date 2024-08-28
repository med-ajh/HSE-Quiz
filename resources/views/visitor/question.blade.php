<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f4f7f6, #e0e5e8);
            font-family: 'Roboto', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevents scrolling to see the background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            background: #fff;
            max-width: 600px;
            width: 100%;
            padding: 2.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            z-index: 1;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.3);
        }
        .card-title {
            font-size: 2rem;
            font-weight: 700;
            color: #EA8003; /* Orange color */
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .card-text {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: #555;
            line-height: 1.6;
        }
        .form-group {
            margin-bottom: 2rem;
        }
        .form-check {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-check-input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        .form-check-input + .form-check-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding-left: 2.5rem;
            font-size: 1.125rem;
            color: #333;
            transition: color 0.3s ease;
        }
        .form-check-input:checked + .form-check-label {
            color: #EA8003; /* Orange color */
        }
        .form-check-input + .form-check-label::before {
            content: "";
            position: absolute;
            left: 0;
            width: 1.75rem;
            height: 1.75rem;
            border: 2px solid #EA8003;
            border-radius: 50%;
            background-color: #fff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .form-check-input:checked + .form-check-label::before {
            background-color: #EA8003;
            border-color: #EA8003;
        }
        .form-check-input:checked + .form-check-label::after {
            content: "\f00c"; /* Checkmark icon from Font Awesome */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: #fff;
            position: absolute;
            left: 0.35rem;
            top: 0.25rem;
            font-size: 1.125rem;
        }
        .btn-icon {
            background-color: #EA8003; /* Orange color */
            border: none;
            color: #fff;
            font-size: 2rem;
            cursor: pointer;
            padding: 0.75rem;
            border-radius: 50%;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-icon:hover {
            background-color: #e65100; /* Darker orange */
            transform: scale(1.1);
        }
        .question-image {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            border: 4px solid #EA8003;
        }
        .icon-container {
            text-align: center;
            margin-top: 2rem;
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
    </style>
</head>
<body>
    <div class="background-animation"></div>
    <div class="container">
        <div class="card">
            <div class="text-center">
                <h5 class="card-title"><i class="fas fa-question-circle"></i> Question {{ $questionNumber }}</h5>
                
                <!-- Display image for the question -->
                <img src="{{ $questionImage }}" alt="Question Image" class="question-image">
                
                <p class="card-text">{{ $questionText }}</p>
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
                    <div class="icon-container">
                        <button type="submit" class="btn-icon" onclick="playSound()">
                            <i class="fas fa-arrow-right"></i> <!-- Using Font Awesome arrow icon -->
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <audio id="buttonSound" src="path/to/sound.mp3" preload="auto"></audio> <!-- Add your sound file here -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        function playSound() {
            var sound = document.getElementById('buttonSound');
            sound.play();
        }
    </script>
</body>
</html>
