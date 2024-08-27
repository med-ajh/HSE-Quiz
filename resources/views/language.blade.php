<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.select_language') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                
                <h1>{{ __('messages.select_language') }}</h1>
                <br>                <br>

                <a href="{{ route('set-language', ['lang' => 'en']) }}" class="btn btn-primary btn-lg">{{ __('messages.english') }}</a>
                <br>                <br>                <br>


                <a href="{{ route('set-language', ['lang' => 'ar']) }}" class="btn btn-primary btn-lg">{{ __('messages.arabic') }}</a>
            </div>
        </div>
    </div>
</body>
</html>
