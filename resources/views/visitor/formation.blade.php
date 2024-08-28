<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.formation') }}</title>
    <link rel="icon" href="{{ asset('images/te.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            animation: fadeInBody 1s ease-out;
        }

        @keyframes fadeInBody {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            text-align: center;
            transform: translateY(20px);
            animation: slideUpContainer 1s ease-out forwards;
        }

        @keyframes slideUpContainer {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            color: #EA8003;
            margin-bottom: 20px;
            letter-spacing: 1.2px;
            animation: fadeInText 1.5s ease-in-out forwards;
            text-transform: uppercase;
        }

        @keyframes fadeInText {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
            animation: fadeInText 1.8s ease-in-out forwards;
        }

        .btn-primary {
            background-color: #EA8003;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 16px;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #EA8003; /* Slightly darker orange on hover */
            transform: scale(1.05);
        }

        .btn-primary:focus {
            box-shadow: 0 0 8px rgba(255, 107, 58, 0.5);
        }
        .logo-container {
            position: absolute;
            top: 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .logo-container img {
            max-height: 67px;
            width: auto;
        }

    </style>
</head>
<body>
    <div class="logo-container">
        <img src="{{ asset('images/te.png') }}" alt="Logo 1">
        <img src="{{ asset('images/hse.png') }}" alt="Logo 2">
    </div>
    <div class="container">
        
        <h1>{{ __('messages.formation') }}</h1>
        <p>{{ __('messages.formation_details') }}</p>
        <a href="{{ route('visitor.video') }}" class="btn btn-primary">{{ __('messages.start') }}</a>
    </div>
</body>
</html>
