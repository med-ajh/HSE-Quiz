<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.registration') }}</title>
    <link rel="icon" href="{{ asset('images/te.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            animation: fadeInBody 1s ease-out;
        }

        @keyframes fadeInBody {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .card {
            background-color: #fff;
            border: none;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            transform: translateY(20px);
            animation: slideUpCard 1s ease-out forwards;
            position: relative;
        }

        @keyframes slideUpCard {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        .card h1 {
            font-size: 28px;
            font-weight: 700;
            color: #EA8003;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 1.2px;
            animation: fadeInText 1.5s ease-in-out forwards;
            text-transform: uppercase;
        }

        @keyframes fadeInText {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .form-label {
            font-weight: 600;
            color: #555;
            font-size: 14px;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .form-control {
            background-color: #f7f7f7;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 14px;
            color: #333;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInText 1.8s ease-in-out forwards;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: #EA8003;
            box-shadow: 0 0 8px rgba(255, 107, 58, 0.5);
        }

        .form-group {
            margin-bottom: 20px;
            animation: slideUpInput 1s ease-out forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) {
            animation-delay: 0.4s;
        }

        .form-group:nth-child(2) {
            animation-delay: 0.6s;
        }

        .form-group:nth-child(3) {
            animation-delay: 0.8s;
        }

        .form-group:nth-child(4) {
            animation-delay: 1s;
        }

        .form-group:nth-child(5) {
            animation-delay: 1.2s;
        }

        @keyframes slideUpInput {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }



        .btn-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 60px;
    height: 60px;
    background-color: transparent;
    border: none;
    border-radius: 50%;
    margin: 30px auto 0;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.3s ease;
}

.btn-icon i {
    font-size: 24px;
    color: #EA8003; /* Orange color */
    transition: color 0.3s ease, transform 0.3s ease;
}

.btn-icon:hover {
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(255, 107, 58, 0.7);
}

.btn-icon:hover i {
    color: #e74c3c; /* Slightly darker orange on hover */
    transform: rotate(15deg);
}





        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
        }


        .logo-container {
            position: absolute;
            top: 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .logo-container img {
            max-height: 67px;
            width: auto;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="{{ asset('images/te.png') }}" alt="Logo 1">
        <img src="{{ asset('images/hse.png') }}" alt="Logo 2">
    </div>
    <div class="card">

        <h1>{{ __('messages.registration') }}</h1>
        <form action="{{ route('visitor.register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="last_name" class="form-label">{{ __('messages.last_name') }}</label>
                <input type="text" id="last_name" name="last_name" class="form-control" required placeholder="{{ __('messages.enter_last_name') }}">
            </div>
            <div class="form-group">
                <label for="first_name" class="form-label">{{ __('messages.first_name') }}</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required placeholder="{{ __('messages.enter_first_name') }}">
            </div>
            <div class="form-group">
                <label for="organization" class="form-label">{{ __('messages.organization') }}</label>
                <input type="text" id="organization" name="organization" class="form-control" required placeholder="{{ __('messages.enter_organization') }}">
            </div>
            <div class="form-group">
                <label for="te_id" class="form-label">{{ __('messages.te_id') }}</label>
                <input type="text" id="te_id" name="te_id" class="form-control" required placeholder="{{ __('messages.enter_te_id') }}">
            </div>
            <div class="form-group">
                <label for="purpose" class="form-label">{{ __('messages.purpose') }}</label>
                <input type="text" id="purpose" name="purpose" class="form-control" required placeholder="{{ __('messages.enter_purpose') }}">
            </div>
            <button type="submit" class="btn-icon">
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
