<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.role_selection') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h1>{{ __('messages.role_selection') }}</h1>
                <a href="{{ route('visitor.registration') }}" class="btn btn-success btn-lg">{{ __('messages.visitor') }}</a>
            </div>
        </div>
    </div>
</body>
</html>
