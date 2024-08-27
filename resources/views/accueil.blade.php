<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TE Connectivity</title>
    @vite(['resources/css/app.css', 'resources/css/custom.css'])
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">TE Connectivity</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/information">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="header">
    <div class="container">
        <h1>Welcome to TE Connectivity</h1>
        <p>Your partner in creating a connected world.</p>
        <a href="#" class="btn mt-4">Start</a>
    </div>
</header>

<div class="container mt-5">
    <h2>About TE Connectivity</h2>
    <p>TE Connectivity is a global leader in creating a safer, sustainable, productive, and connected future.</p>
</div>

<footer class="footer mt-auto">
    <div class="container">
        <p>&copy; 2024 TE Connectivity. All rights reserved.</p>
    </div>
</footer>

@vite('resources/js/app.js')
</body>
</html>
