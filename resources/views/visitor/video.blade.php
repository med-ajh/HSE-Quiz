<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Video Tutorial') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f4f7f6, #e0e5e8);
            font-family: 'Roboto', sans-serif;
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1800px; /* Increased width */
            margin: 0 auto; /* Center the card */
        }
        .card-header {
            background: #EA8003; /* Orange color */
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
        .card-header h4 {
            margin: 0;
            font-size: 1.75rem; /* Increased font size */
        }
        .card-body {
            padding: 0;
        }
        .video-container {
            position: relative;
            padding-top: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            background: #000;
            border-radius: 15px;
            width: 100%;
            margin: 0 auto; /* Center the video */
        }
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the video covers the container */
            border: 0; /* Removed the border */
        }
        .card-footer {
            background: #f8f9fa;
            text-align: center;
            padding: 1rem;
        }
        .btn-icon {
            background-color: #EA8003; /* Orange color */
            border: none;
            color: #fff;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.75rem;
            border-radius: 50%;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-icon:hover {
            background-color: #e65100; /* Darker orange */
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">

                    <div class="card-body">
                        <div class="video-container">
                            <video autoplay muted controls>
                                <source src="{{ $videoPath }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('visitor.roles') }}" class="btn btn-icon">
                            <i class="fas fa-arrow-right"></i> <!-- Arrow icon for "Start Quiz" -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
