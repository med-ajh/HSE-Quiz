<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
        }
        .card {
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .card-text {
            font-size: 0.875rem;
            color: #495057;
            margin-bottom: 1rem;
        }
        .btn-outline-primary, .btn-warning, .btn-danger {
            border-radius: 0.5rem;
            transition: background-color 0.2s, color 0.2s;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .card-footer {
            background-color: #f1f3f5;
            border-top: 1px solid #e9ecef;
            padding: 1rem;
        }
        .table-header {
            border-bottom: 2px solid #dee2e6;
            background-color: #e9ecef;
            font-weight: 600;
            color: #495057;
        }
        .table-header th {
            padding: 1rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Quiz Dashboard</h1>
        <a href="{{ route('formation.create') }}" class="btn btn-primary mb-4">Create New Quiz</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-header">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Video</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quiz)
                        <tr>
                            <td>
                                @if ($quiz->image)
                                    <img src="{{ Storage::url($quiz->image) }}" alt="Quiz Image" style="width: 100px; height: auto; border-radius: 0.5rem;">
                                @else
                                    <img src="{{ asset('images/placeholder.png') }}" alt="Default Image" style="width: 100px; height: auto; border-radius: 0.5rem;">
                                @endif
                            </td>
                            <td>{{ $quiz->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($quiz->description, 50) }}</td>
                            <td>
                                @if ($quiz->video)
                                    <a href="{{ Storage::url($quiz->video) }}" class="btn btn-outline-primary" target="_blank">
                                        <i class="fas fa-video"></i> Watch Video
                                    </a>
                                @else
                                    <span class="text-muted">No Video Available</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('formation.edit', $quiz->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('formation.destroy', $quiz->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
