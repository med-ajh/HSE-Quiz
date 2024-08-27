<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Select Role') }}</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('Select Your Role') }}</h1>
        <form action="{{ route('category.choose') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>
                    <input type="radio" name="role" value="Visitor" required>
                    {{ __('Visitor') }}
                </label>
                <label>
                    <input type="radio" name="role" value="Contractor" required>
                    {{ __('Contractor') }}
                </label>
            </div>
            <button type="submit">{{ __('Submit') }}</button>
            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif
        </form>
    </div>
</body>
</html>
