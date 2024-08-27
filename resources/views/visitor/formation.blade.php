<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.formation') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ __('messages.formation') }}</h1>
                <p>{{ __('messages.formation_details') }}</p>
                <a href="{{ route('visitor.video') }}" class="btn btn-primary">{{ __('messages.start') }}</a>
            </div>
        </div>
    </div>
</body>
</html>
