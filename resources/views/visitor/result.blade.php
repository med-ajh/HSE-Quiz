<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .result-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            background-color: #ffffff;
        }
        .result-card h5 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }
        .result-card p {
            font-size: 1rem;
            color: #555;
        }
        .result-card .stars {
            font-size: 2rem;
            color: #f39c12;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004494;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .print-button {
            background-color: #28a745;
            border-color: #28a745;
        }
        .print-button:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card result-card text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $score >= 6 ? 'Congratulations!' : 'Quiz Result' }}</h5>
                        <p>Thank you, {{ $visitor->first_name }} {{ $visitor->last_name }}. Here are your results:</p>
                        <p><strong>Score:</strong> {{ $score }} out of 10</p>

                        <div class="stars">
                            @for ($i = 1; $i <= $stars; $i++)
                                ★
                            @endfor
                        </div>

                        @if ($score >= 6)
                            <p>Congratulations on passing the quiz!</p>
                            <button onclick="printInfo()" class="btn btn-success print-button mt-3">Print Information</button>
                        @else
                            <p>Unfortunately, you did not pass the quiz. Please try again.</p>
                            <a href="{{ route('visitor.video') }}" class="btn btn-primary mt-3">Retry Quiz</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function printInfo() {
            var printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Visitor Information</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write('<h1>Visitor Information</h1>');
            printWindow.document.write('<p><strong>First Name:</strong> {{ $visitor->first_name }}</p>');
            printWindow.document.write('<p><strong>Last Name:</strong> {{ $visitor->last_name }}</p>');
            printWindow.document.write('<p><strong>Organization:</strong> {{ $visitor->organization }}</p>');
            printWindow.document.write('<p><strong>TE ID:</strong> {{ $visitor->te_id }}</p>');
            printWindow.document.write('<p><strong>Purpose:</strong> {{ $visitor->purpose }}</p>');
            printWindow.document.write('<p><strong>Score:</strong> {{ $score }} out of 10</p>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.onafterprint = function() {
                window.location.href = "{{ route('language') }}"; // Redirect to the main page after printing
            };
        }
    </script>
</body>
</html>
