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
            margin: 0;
            overflow: hidden; /* Prevent scrollbars */
        }
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: #000;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="video-container">
        <video id="videoPlayer" autoplay controls>
            <source src="{{ $videoPath }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- JavaScript to handle video volume and redirection -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.getElementById('videoPlayer');
            video.volume = 1.0; // Set volume to max (0.0 to 1.0)
            
            video.addEventListener('ended', function() {
                window.location.href = "{{ route('visitor.roles') }}"; // Redirect after video ends
            });
        });
    </script>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
