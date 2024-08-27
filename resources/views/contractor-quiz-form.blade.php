<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.formations.' . $formation) }}</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('messages.formations.' . $formation) }}</h1>
        <!-- Display content based on formation -->
        <p>Content for {{ __('messages.formations.' . $formation) }} goes here.</p>
        <!-- Add your quiz content here -->
    </div>
</body>
</html>
