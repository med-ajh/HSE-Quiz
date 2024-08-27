<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.result') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>{{ __('messages.congratulations') }}</h1>
                <p>{{ __('messages.result') }}</p>
                <!-- You can dynamically generate the certificate information here -->
                <a href="{{ route('visitor.welcome') }}" class="btn btn-primary">{{ __('messages.back_to_home') }}</a>
            </div>
        </div>
    </div>
</body>
</html>
