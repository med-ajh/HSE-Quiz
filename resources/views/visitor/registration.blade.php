<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.registration') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ __('messages.registration') }}</h1>
                <form action="{{ route('visitor.register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="last_name">{{ __('messages.last_name') }}</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="first_name">{{ __('messages.first_name') }}</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="organization">{{ __('messages.organization') }}</label>
                        <input type="text" id="organization" name="organization" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="te_id">{{ __('messages.te_id') }}</label>
                        <input type="text" id="te_id" name="te_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="purpose">{{ __('messages.purpose') }}</label>
                        <input type="text" id="purpose" name="purpose" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
