<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Video</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        .video-section {
            margin-bottom: 2rem;
        }
        video {
            width: 100%;
            height: auto;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #ff6f00;
            border-color: #ff6f00;
            border-radius: 0.5rem;
            padding: 0.75rem;
            font-size: 1rem;
            text-transform: uppercase;
            color: #fff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #e65c00;
            border-color: #e65c00;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="video-section">
            <h1>{{ $formation['title'] }}</h1>
            <video id="training-video" controls>
                <source src="{{ asset('videos/' . $formation['video']) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <button id="start-quiz" class="btn btn-primary">Start Test</button>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('start-quiz').addEventListener('click', function() {
            window.location.href = "{{ route('formations.quiz', $formation['id']) }}";
        });

        // Redirect to the quiz page after the video ends
        document.getElementById('training-video').addEventListener('ended', function() {
            window.location.href = "{{ route('formations.quiz', $formation['id']) }}";
        });
    </script>
</body>
</html>
