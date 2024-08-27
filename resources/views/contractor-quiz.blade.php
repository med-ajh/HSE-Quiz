<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.contractor_quiz_title') }}</title>
    <style>
        .formation-option {
            display: inline-block;
            margin: 10px;
            cursor: pointer;
            text-align: center;
        }
        .formation-option img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('messages.contractor_quiz_title') }}</h1>
        <div class="formation-list">
            @foreach (['general', 'electrical', 'height', 'loto', 'guarding'] as $formation)
                <div class="formation-option" onclick="window.location.href='{{ route('contractor.quiz.show', ['formation' => $formation]) }}'">
                    <img src="/images/{{ $formation }}.png" alt="{{ __('messages.formation.' . $formation) }}">
                    <p>{{ __('messages.formation.' . $formation) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
