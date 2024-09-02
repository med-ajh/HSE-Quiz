<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Formation</title>
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
        .hero-section {
            background: #ff6f00;
            color: #fff;
            padding: 3rem 2rem;
            border-radius: 1rem;
            margin-bottom: 3rem;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .hero-section p {
            font-size: 1.2rem;
            margin-top: 0;
        }
        .formation-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .formation-card {
            display: flex;
            flex-direction: column;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
            text-decoration: none;
            color: inherit;
            position: relative;
            cursor: pointer;
        }
        .formation-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: filter 0.3s ease;
        }
        .formation-card .card-body {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .formation-card .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.75rem;
        }
        .formation-card .card-text {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
        }
        .formation-card .btn-primary {
            background-color: #ff6f00;
            border-color: #ff6f00;
            border-radius: 0.5rem;
            padding: 0.75rem;
            font-size: 1rem;
            text-transform: uppercase;
            color: #fff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .formation-card .btn-primary:hover {
            background-color: #e65c00;
            border-color: #e65c00;
        }
        .formation-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
            filter: grayscale(0%);
        }
        .formation-card:not(:hover) img {
            filter: grayscale(100%);
        }
        .formation-card a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero-section">
            <h1>Select a Formation</h1>
            <p>Explore our curated range of formations designed to boost your skills and expertise.</p>
        </div>

        <div class="formation-container">
            @foreach($formations as $formation)
                <a href="{{ route('formations.video', $formation['id']) }}" class="formation-card">
                    <img src="{{ asset('images/' . $formation['image']) }}" alt="Formation Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $formation['title'] }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($formation['description'], 150) }}</p>
                        <button class="btn btn-primary">
                            <i class="fas fa-play btn-icon"></i> Start Learning
                        </button>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
