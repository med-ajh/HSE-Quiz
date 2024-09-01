<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        .custom-file-upload {
            border: 1px solid #ced4da;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            height: 100%;
            width: 100%;
        }
        .preview-container {
            margin-top: 15px;
        }
        .preview-container img,
        .preview-container video {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create a New Quiz</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('formation.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Quiz Details</h4>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter quiz title" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter quiz description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="video" class="form-label">Video</label>
                        <div class="file-input-wrapper">
                            <input type="file" name="video" id="video" accept="video/*">
                            <label for="video" class="custom-file-upload">
                                <i class="fas fa-upload"></i> Choose Video
                            </label>
                        </div>
                        <small class="form-text text-muted">Accepted formats: mp4, mov, avi (Max: 20MB)</small>
                        <div class="preview-container" id="video-preview"></div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <div class="file-input-wrapper">
                            <input type="file" name="image" id="image" accept="image/*">
                            <label for="image" class="custom-file-upload">
                                <i class="fas fa-upload"></i> Choose Image
                            </label>
                        </div>
                        <small class="form-text text-muted">Accepted formats: jpeg, png, jpg, gif (Max: 2MB)</small>
                        <div class="preview-container" id="image-preview"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('video').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('video-preview');
            previewContainer.innerHTML = ''; // Clear previous previews
            if (file) {
                const url = URL.createObjectURL(file);
                const video = document.createElement('video');
                video.src = url;
                video.controls = true;
                previewContainer.appendChild(video);
            }
        });

        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = ''; // Clear previous previews
            if (file) {
                const url = URL.createObjectURL(file);
                const img = document.createElement('img');
                img.src = url;
                previewContainer.appendChild(img);
            }
        });
    </script>
</body>
</html>
