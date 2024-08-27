<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.contact') }}</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            text-align: center;
            max-width: 800px;
            margin: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .contact-info {
            margin: 20px 0;
            font-size: 18px;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('messages.contact') }}</h1>
        <div class="contact-info">
            <p><strong>{{ __('messages.address') }}:</strong> 1234 Tech Drive, Suite 500, City, Country</p>
            <p><strong>{{ __('messages.phone') }}:</strong> +1 (123) 456-7890</p>
            <p><strong>{{ __('messages.email') }}:</strong> contact@teconnectivity.com</p>
        </div>
        <a href="{{ url('/') }}" class="button">{{ __('messages.back_to_home') }}</a>
    </div>
</body>
</html>
