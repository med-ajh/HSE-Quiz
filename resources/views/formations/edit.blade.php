<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Quiz</h1>
        <form method="POST" action="{{ route('formation.update', $quiz->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $quiz->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $quiz->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="video">Video URL</label>
                <input type="url" name="video" id="video" class="form-control" value="{{ $quiz->video }}">
            </div>
            <div class="form-group">
                <label for="image">Image URL</label>
                <input type="url" name="image" id="image" class="form-control" value="{{ $quiz->image }}">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Quiz</button>
        </form>
    </div>
</body>
</html>
