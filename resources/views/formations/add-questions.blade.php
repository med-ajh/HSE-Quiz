<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Questions</title>
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
        .question-card {
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            box-shadow: 0 0 .125rem rgba(0, 0, 0, .075);
            margin-bottom: 1rem;
            padding: 1rem;
        }
        .remove-question {
            color: red;
            cursor: pointer;
        }
        .image-preview {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }
        .image-preview-container {
            margin-bottom: 10px;
        }
        .default-image {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
            background-image: url('{{ asset('images/te.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add Questions to Quiz</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('formation.storeQuestions', $quizId) }}" enctype="multipart/form-data">
            @csrf
            <div id="questions-container">
                @for ($i = 1; $i <= 10; $i++)
                    <div class="question-card">
                        <h4 class="mb-3">Question {{ $i }}</h4>
                        <div class="form-group">
                            <label for="questions[{{ $i }}][question_text]">Question Text</label>
                            <input type="text" name="questions[{{ $i }}][question_text]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="questions[{{ $i }}][option_a]">Option A</label>
                            <input type="text" name="questions[{{ $i }}][option_a]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="questions[{{ $i }}][option_b]">Option B</label>
                            <input type="text" name="questions[{{ $i }}][option_b]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="questions[{{ $i }}][option_c]">Option C</label>
                            <input type="text" name="questions[{{ $i }}][option_c]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="questions[{{ $i }}][correct_option]">Correct Option</label>
                            <select name="questions[{{ $i }}][correct_option]" class="form-control" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="questions[{{ $i }}][image]">Question Image</label>
                            <div class="file-input-wrapper">
                                <input type="file" name="questions[{{ $i }}][image]" id="image{{ $i }}" accept="image/*" onchange="previewImage(event, {{ $i }})">
                                <label for="image{{ $i }}" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose Image
                                </label>
                            </div>
                            <small class="form-text text-muted">Accepted formats: jpeg, png, jpg, gif (Max: 2MB)</small>
                            <div id="image-preview-container{{ $i }}" class="image-preview-container">
                                <img id="image-preview{{ $i }}" class="image-preview default-image" src="{{ asset('images/te.png') }}" alt="Image Preview">
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger remove-question">
                            <i class="fas fa-trash-alt"></i> Remove Question
                        </button>
                    </div>
                @endfor
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Questions</button>
        </form>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function previewImage(event, index) {
            const reader = new FileReader();
            const preview = document.getElementById(`image-preview${index}`);

            reader.onload = function() {
                preview.src = reader.result;
                preview.classList.remove('default-image');
            };

            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            } else {
                preview.src = '{{ asset('images/te.png') }}';
                preview.classList.add('default-image');
            }
        }

        $(document).ready(function() {
            // Remove question functionality
            $('.remove-question').click(function() {
                $(this).closest('.question-card').remove();
            });
        });
    </script>
</body>
</html>
