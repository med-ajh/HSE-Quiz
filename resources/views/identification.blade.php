<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.identification_form') }}</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('messages.identification_form') }}</h1>
        @if (session('status'))
            <p>{{ session('status') }}</p>
        @endif
        <form action="{{ route('form.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="last_name">{{ __('messages.last_name') }}</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="first_name">{{ __('messages.first_name') }}</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="organization">{{ __('messages.organization') }}</label>
                <input type="text" id="organization" name="organization" required>
            </div>
            <div class="form-group">
                <label for="te_id">{{ __('messages.te_id') }}</label>
                <input type="text" id="te_id" name="te_id" required>
            </div>
            <div class="form-group">
                <label for="purpose">{{ __('messages.purpose') }}</label>
                <input type="text" id="purpose" name="purpose" required>
            </div>
            <div class="form-group">
                <button type="submit">{{ __('messages.submit') }}</button>
            </div>
        </form>
    </div>
</body>
</html>
