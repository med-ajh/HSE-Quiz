<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.visitor_quiz_title') }}</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('messages.visitor_quiz_title') }}</h1>
        <video controls>
            <source src="/videos/visitor-formation.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <form action="{{ route('visitor.quiz.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="question1">Question 1:</label>
                <input type="text" id="question1" name="question1" required>
            </div>
            <!-- Add more questions here -->
            <button type="submit">{{ __('messages.submit') }}</button>
        </form>
    </div>
</body>
</html>
