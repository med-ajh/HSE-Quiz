<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor ID Card</title>
    <link rel="icon" href="{{ asset('images/te.png') }}" type="image/png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0e5e8, #f4f7f6);
            font-family: 'Roboto', sans-serif;
            color: #333;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 165, 0, 0.2), rgba(255, 255, 255, 0));
            animation: backgroundAnimation 15s ease infinite;
            z-index: -1;
        }

        .logo {
            width: 120px; /* Adjust size as needed */
            height: auto;
            margin-bottom: 20px; /* Space between logo and card */
            position: absolute;
            top: 10px; /* Distance from top */
            left: 50%;
            transform: translateX(-50%);
            z-index: 1; /* Ensure it is above other elements */
        }

        .result-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            padding: 20px;
            background-color: #EA8003; /* Orange background */
            color: #fff; /* White text color for contrast */
            text-align: center;
            max-width: 600px;
            margin: auto;
            margin-top: 80px; /* Ensure space between logo and card */
        }

        .result-card h5 {
            font-size: 1.75rem;
            margin-bottom: 15px;
            color: #ffffff; /* White text color */
        }

        .result-card p {
            font-size: 1.1rem;
            color: #ffffff; /* White text color */
        }

        .stars {
            font-size: 2rem;
            color: #f8d700; /* Gold color for stars */
            margin: 20px 0;
        }

        .stars i {
            color: #f8d700; /* Gold color for filled stars */
        }

        .stars i.empty {
            color: #ccc; /* Gray color for empty stars */
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
            color: #d97706; /* White text color */
        }

        .btn-icon:hover {
            background-color: #d97706;
            color: #ffffff; /* White text color */
        }

        .retry-button {
            background-color: #EA8003; /* Orange background */
            border-color: #EA8003; /* Orange border */
            color: #ffffff; /* White text color */
        }

        .retry-button:hover {
            background-color: #d97706; /* Darker orange on hover */
        }

        .retry-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
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
    <div class="background-animation"></div>
    <img src="{{ asset('images/te.png') }}" alt="Logo" class="logo">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="result-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $score >= 6 ? 'Congratulations!' : 'Quiz Result' }}</h5>
                        <p>Thank you, {{ $visitor->first_name }} {{ $visitor->last_name }}. Here are your results:</p>
                        <p><strong>Score:</strong> {{ $score }} out of 10</p>

                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= max(0, min(5, $score - 5)) ? 'filled' : 'empty' }}"></i>
                            @endfor
                        </div>

                        @if ($score >= 6)
                            <p>Congratulations on passing the Test!</p>
                            <button onclick="printInfo(); playSound('print-sound.mp3');" class="btn-icon print-button" title="Print"><i class="fas fa-print"></i></button>
                        @else
                            <p>Unfortunately, you did not pass the test. Please try again.</p>
                            <div class="retry-container">
                                <button onclick="retryQuiz();" class="btn-icon retry-button" title="Retry"><i class="fas fa-redo"></i></button>
                            </div>
                        @endif
                        <a href="{{ route('language') }}" class="btn-icon back-button" title="Back"><i class="fas fa-arrow-left"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function playSound(soundFile) {
            var audio = new Audio(soundFile);
            audio.play();
        }

        function printInfo() {
    var leftLogoUrl = "{{ asset('images/hse.png') }}";
    var rightLogoUrl = "{{ asset('images/te.png') }}";

    // Create a hidden iframe for printing
    var iframe = document.createElement('iframe');
    iframe.style.position = 'absolute';
    iframe.style.width = '0px';
    iframe.style.height = '0px';
    iframe.style.border = 'none';
    document.body.appendChild(iframe);

    var iframeDoc = iframe.contentWindow.document;

    // Write the content to the iframe
    iframeDoc.open();
    iframeDoc.write('<html><head><title>Visitor ID Card</title>');
    iframeDoc.write('<style>');
    iframeDoc.write('@page { size: 105mm 74mm; margin: 0; }');
    iframeDoc.write('body { font-family: Arial, sans-serif; width: 148mm; height: 105mm; margin: 0; display: flex; justify-content: center; align-items: center; background-color: #e9ecef; }');
    iframeDoc.write('.card { width: 100%; height: 100%; display: flex; flex-direction: column; border: none; border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); background-color: #ffffff; overflow: hidden; }');
    iframeDoc.write('.top-bar { display: flex; justify-content: space-between; align-items: center; padding: 15px; background: linear-gradient(90deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.05) 100%); color: #000; border-bottom: 1px solid #ddd; }');
    iframeDoc.write('.logo { width: 60px; height: auto; }');
    iframeDoc.write('.title { text-align: center; font-size: 20px; font-weight: bold; color: #EA8003; flex: 1; }');
    iframeDoc.write('.content { display: flex; justify-content: space-between; padding: 21px; }');
    iframeDoc.write('.left-side, .right-side { width: 48%; padding: 10px; box-sizing: border-box; }');
    iframeDoc.write('.left-side { border-right: 1px solid #ddd; }');
    iframeDoc.write('.right-side { border-left: 1px solid #ddd; }');
    iframeDoc.write('.left-side p strong, .right-side p strong { color: #EA8003; }');
    iframeDoc.write('.stars { font-size: 20px; color: #EA8003; text-align: center; margin: 16px 0; }');
    iframeDoc.write('</style></head><body>');
    iframeDoc.write('<div class="card">');
    iframeDoc.write('<div class="top-bar">');
    iframeDoc.write('<img src="' + leftLogoUrl + '" alt="Left Logo" class="logo">');
    iframeDoc.write('<div class="title">Visitor Identification Card</div>');
    iframeDoc.write('<img src="' + rightLogoUrl + '" alt="Right Logo" class="logo">');
    iframeDoc.write('</div>');
    iframeDoc.write('<div class="content">');
    iframeDoc.write('<div class="left-side">');
    iframeDoc.write('<p><strong>First Name :</strong> {{ $visitor->first_name }}</p>');
    iframeDoc.write('<p><strong>Last Name : </strong> {{ $visitor->last_name }}</p>');
    iframeDoc.write('<p><strong>Organization : </strong> {{ $visitor->organization }}</p>');
    iframeDoc.write('<p><strong>TE ID / CNE : </strong> {{ $visitor->te_id }}</p>');
    iframeDoc.write('</div>');
    iframeDoc.write('<div class="right-side">');
    iframeDoc.write('<p><strong>Score : </strong> {{ $score }} out of 10</p>');
    iframeDoc.write('<p><strong>Date : </strong> {{ date("d-m-Y") }}</p>');
    iframeDoc.write('<p><strong>Status : </strong> {{ $score >= 6 ? "Passed" : "Failed" }}</p>');
    iframeDoc.write('</div>');
    iframeDoc.write('</div>');
    iframeDoc.write('<p><strong>Purpose of visit : </strong> {{ $visitor->purpose }}</p>');
    iframeDoc.write('</div>');
    iframeDoc.write('</body></html>');
    iframeDoc.close();

    // Wait for the iframe to load the content before printing
    iframe.onload = function() {
        iframe.contentWindow.focus();
        iframe.contentWindow.print();
        // Remove the iframe after printing
        document.body.removeChild(iframe);
    };
}

        function retryQuiz() {
            window.location.href = "{{ route('visitor.video') }}";
        }
    </script>
</body>
</html>
