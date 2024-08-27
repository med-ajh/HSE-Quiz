<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.identification_form') }}</title>
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
            max-width: 600px;
            width: 100%;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('messages.identification_form') }}</h1>
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
