<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.select_language') }}</title>
    <link rel="icon" href="{{ asset('images/te.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            overflow: hidden;
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

        .container {
            max-width: 1000px;
            padding: 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
            position: relative;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            color: #EA8003;
            margin-bottom: 40px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            animation: slideDown 1s ease-out;
        }

        @keyframes slideDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .language-options {
            display: flex;
            justify-content: space-around;
            gap: 40px;
            margin-top: 20px;
        }

        .language-card {
            flex: 1;
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
            text-align: center;
            position: relative;
            overflow: hidden;
            text-decoration: none;
        }

        .language-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .language-card i {
            font-size: 60px;
            color: #EA8003;
            margin-bottom: 25px;
        }

        .language-card h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #EA8003;
            text-transform: uppercase;
        }

        .language-card p {
            font-size: 18px;
            color: #555;
            line-height: 1.5;
        }

        .language-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(234, 128, 3, 0.15) 0%, rgba(234, 128, 3, 0.4) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .language-card:hover:before {
            opacity: 1;
        }

        /* Remove blue underline from links */
        a {
            text-decoration: none;
            color: inherit;
        }

        a:hover, a:focus {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="{{ asset('images/te.png') }}" alt="Logo 1">
        <img src="{{ asset('images/hse.png') }}" alt="Logo 2">

    </div>
    <div class="container">
        <h1>{{ __('messages.select_language') }}</h1>
        <div class="language-options">
            <a href="{{ route('set-language', ['lang' => 'en']) }}" class="language-card">
                <i class="fa-solid fa-globe"></i>
                <h2>English</h2>
                <p>Experience our platform in English. Navigate with ease and get the information you need in your preferred language.</p>
            </a>
            <a href="{{ route('set-language', ['lang' => 'ar']) }}" class="language-card">
                <i class="fa-solid fa-language"></i>
                <h2>العربية</h2>
                <p>استخدم منصتنا باللغة العربية. تصفح بسهولة واحصل على المعلومات التي تحتاجها بلغتك المفضلة.</p>
            </a>
        </div>
    </div>
</body>
</html>
