<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.select_language') }}</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            text-align: center;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .ar-button {
            background-color: #28a745;
        }
        .ar-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('messages.select_language') }}</h1>
        <a href="{{ route('language.switch', ['lang' => 'en']) }}" class="button">{{ __('messages.english') }}</a>
        <a href="{{ route('language.switch', ['lang' => 'ar']) }}" class="button ar-button">{{ __('messages.arabic') }}</a>
    </div>
</body>
</html>
