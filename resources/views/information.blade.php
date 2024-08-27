<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.company_info') }}</title>
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
        .info {
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
        <h1>{{ __('messages.company_info') }}</h1>
        <div class="info">
            <p>TE Connectivity is a global technology leader in the design and manufacturing of connectivity and sensor solutions for a variety of industries. We provide comprehensive solutions to keep the world moving forward, enabling a wide range of applications from automotive to telecommunications.</p>
            <p>Our company is committed to innovation, quality, and service excellence. We leverage our deep expertise and advanced technologies to solve our customers’ most challenging problems and drive growth and success.</p>
        </div>
        <a href="{{ url('/') }}" class="button">{{ __('messages.back_to_home') }}</a>
    </div>
</body>
</html>
