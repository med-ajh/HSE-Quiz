<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor ID Card</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }
        .result-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            padding: 20px;
            background-color: #ffffff;
            text-align: center;
            max-width: 600px;
            margin: auto;
        }
        .result-card h5 {
            font-size: 1.75rem;
            margin-bottom: 15px;
            color: #333;
        }
        .result-card p {
            font-size: 1.1rem;
            color: #555;
        }
        .result-card .stars {
            font-size: 2rem;
            color: #f39c12;
            margin: 20px 0;
        }
        .btn-icon {
            font-size: 1.5rem;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-icon:hover {
            background-color: #f8f9fa;
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
        .card {
            width: 148mm;
            height: 105mm;
            display: flex;
            flex-direction: column;
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: linear-gradient(90deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.05) 100%);
            color: #000;
            border-bottom: 1px solid #ddd;
        }
        .logo {
            width: 60px;
            height: auto;
        }
        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #000;
            flex: 1;
        }
        .content {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            flex: 1;
        }
        .left-side, .right-side {
            width: 48%;
            padding: 10px;
            box-sizing: border-box;
        }
        .left-side {
            border-right: 1px solid #ddd;
        }
        .right-side {
            border-left: 1px solid #ddd;
        }
        .left-side p, .right-side p {
            margin: 0;
            font-size: 14px;
        }
        .left-side p strong, .right-side p strong {
            color: #f39c12; /* Orange color for titles */
        }
        .stars {
            font-size: 20px;
            color: #f39c12;
            text-align: center;
            margin: 15px 0;
        }
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .print-button {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="result-card">
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
                            <p>Congratulations on passing the Test!</p>
                            <button onclick="printInfo()" class="btn-icon print-button text-light" title="Print"><i class="fas fa-print"></i></button>
                        @else
                            <p>Unfortunately, you did not pass the test. Please try again.</p>
                            <a href="{{ route('visitor.video') }}" class="btn btn-primary mt-3">Retry Test</a>
                        @endif
                        <a href="{{ route('language') }}" class="btn-icon back-button text-light" title="Back"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function printInfo() {
            var leftLogoUrl = "{{ asset('images/hse.png') }}";
            var rightLogoUrl = "{{ asset('images/te.png') }}";
            var printWindow = window.open('', '', 'height=105mm,width=148mm');
            printWindow.document.write('<html><head><title>Visitor ID Card</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('@page { size: 148mm 105mm; margin: 0; }');
            printWindow.document.write('body { font-family: Arial, sans-serif; width: 148mm; height: 105mm; margin: 0; display: flex; justify-content: center; align-items: center; background-color: #e9ecef; }');
            printWindow.document.write('.card { width: 100%; height: 100%; display: flex; flex-direction: column; border: none; border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); background-color: #ffffff; overflow: hidden; }');
            printWindow.document.write('.top-bar { display: flex; justify-content: space-between; align-items: center; padding: 15px; background: linear-gradient(90deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.05) 100%); color: #000; border-bottom: 1px solid #ddd; }');
            printWindow.document.write('.logo { width: 60px; height: auto; }');
            printWindow.document.write('.title { text-align: center; font-size: 20px; font-weight: bold; color: #000; flex: 1; }');
            printWindow.document.write('.content { display: flex; justify-content: space-between; padding: 20px; }');
            printWindow.document.write('.left-side, .right-side { width: 48%; padding: 10px; box-sizing: border-box; }');
            printWindow.document.write('.left-side { border-right: 1px solid #ddd; }');
            printWindow.document.write('.right-side { border-left: 1px solid #ddd; }');
            printWindow.document.write('.left-side p strong, .right-side p strong { color: #f39c12; }');
            printWindow.document.write('.stars { font-size: 20px; color: #f39c12; text-align: center; margin: 15px 0; }');
            printWindow.document.write('</style></head><body>');
            printWindow.document.write('<div class="card">');
            printWindow.document.write('<div class="top-bar">');
            printWindow.document.write('<img src="' + leftLogoUrl + '" alt="Left Logo" class="logo">');
            printWindow.document.write('<div class="title">Visitor Identification Card</div>');
            printWindow.document.write('<img src="' + rightLogoUrl + '" alt="Right Logo" class="logo">');
            printWindow.document.write('</div>');
            printWindow.document.write('<div class="content">');
            printWindow.document.write('<div class="left-side">');
            printWindow.document.write('<p><strong>First Name : </strong> {{ $visitor->first_name }}</p>');
            printWindow.document.write('<p><strong>Last Name : </strong> {{ $visitor->last_name }}</p>');
            printWindow.document.write('<p><strong>Organization : </strong> {{ $visitor->organization }}</p>');
            printWindow.document.write('<p><strong>TE ID / CNE : </strong> {{ $visitor->te_id }}</p>');
            printWindow.document.write('</div>');
            printWindow.document.write('<div class="right-side">');
            printWindow.document.write('<p><strong>Score : </strong> {{ $score }} out of 10</p>');
            printWindow.document.write('<p><strong>Date : </strong> {{ date("d-m-Y") }}</p>');
            printWindow.document.write('<p><strong>Status : </strong> {{ $score >= 6 ? "Passed" : "Failed" }}</p>');
            printWindow.document.write('</div>');
            printWindow.document.write('</div>');
            printWindow.document.write('<p><strong>Purpose of visit : </strong> {{ $visitor->purpose }}</p>');
            printWindow.document.write('</div>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
        }
    </script>
</body>
</html>
