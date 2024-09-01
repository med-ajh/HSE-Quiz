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
            width: 120px;
            height: auto;
            margin-bottom: 20px;
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }

        .result-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            padding: 20px;
            background-color: #EA8003;
            color: #fff;
            text-align: center;
            max-width: 600px;
            margin: auto;
            margin-top: 80px;
        }

        .result-card h5 {
            font-size: 1.75rem;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .result-card p {
            font-size: 1.1rem;
            color: #ffffff;
        }

        .stars {
            font-size: 2rem;
            color: #f8d700;
            margin: 20px 0;
        }

        .stars i.empty {
            color: #ccc;
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
            background-color: #d97706;
            color: #ffffff;
        }

        .retry-button {
            background-color: #EA8003;
            border-color: #EA8003;
            color: #ffffff;
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
                        <h5 class="card-title">
                            @if ($score == 0)
                                Retry again.
                            @elseif ($score == 1)
                                Good job, but not great.
                            @elseif ($score == 2)
                                Well done!
                            @elseif ($score == 3)
                                Excellent! Success.
                            @endif
                        </h5>
                        <p>Thank you, {{ $visitor->first_name }} {{ $visitor->last_name }}. Here are your results:</p>
                        <p><strong>Score:</strong> {{ $score }} out of 3</p>

                        <div class="stars">
                            @for ($i = 1; $i <= 3; $i++)
                                <i class="fas fa-star {{ $i <= $score ? '' : 'empty' }}"></i>
                            @endfor
                        </div>

                        @if ($score == 0 || $score == 1)
                            <div class="retry-container">
                                <button onclick="retryQuiz();" class="btn-icon retry-button" title="Retry"><i class="fas fa-redo"></i></button>
                            </div>
                        @endif

                        @if ($score >= 2)
                            <p>You've successfully passed the test.</p>
                            <button onclick="printInfo(); playSound('print-sound.mp3');" class="btn-icon print-button" title="Print"><i class="fas fa-print"></i></button>
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
    var qrCodeUrl = "{{ asset('images/qrcode.jpg') }}";

    var iframe = document.createElement('iframe');
    iframe.style.position = 'absolute';
    iframe.style.width = '0px';
    iframe.style.height = '0px';
    iframe.style.border = 'none';
    document.body.appendChild(iframe);

    var iframeDoc = iframe.contentWindow.document;

    iframeDoc.open();
    iframeDoc.write('<html><head><title>Visitor ID Card</title>');
    iframeDoc.write('<style>');
    iframeDoc.write('@page { size: 148mm 105mm; margin: 0; }');
    iframeDoc.write('body { font-family: "Helvetica Neue", Arial, sans-serif; width: 148mm; height: 105mm; margin: 0; display: flex; justify-content: center; align-items: center; background-color: #f5f5f5; }');
    
    // Styling for card layout
    iframeDoc.write('.card { width: 100%; height: 100%; display: flex; flex-direction: column; border: none; border-radius: 15px; box-shadow: 0 12px 24px rgba(0,0,0,0.15); background: linear-gradient(145deg, #f8f8f8, #e0e0e0); overflow: hidden; padding: 15px; }');
    
    // Header styling
    iframeDoc.write('.header { display: flex; justify-content: space-between; align-items: center; background-color: #222; padding: 10px 20px; border-radius: 10px 10px 0 0; color: #ffffff; }');
    iframeDoc.write('.logo { width: 80px; height: auto; }'); // Increased logo size for more emphasis
    iframeDoc.write('.header-title { text-align: center; font-size: 24px; font-weight: bold; letter-spacing: 1px; color: #EA8003; flex: 1; }');

    // Main content section styling
    iframeDoc.write('.content { display: flex; justify-content: space-between; padding: 20px; background: #ffffff; border-radius: 0 0 15px 15px; }');
    iframeDoc.write('.left-side, .right-side { width: 45%; padding: 10px; box-sizing: border-box; }');
    iframeDoc.write('.left-side { border-right: 1px solid #ddd; }');
    iframeDoc.write('.left-side p, .right-side p { margin: 10px 0; }');
    iframeDoc.write('.left-side p strong, .right-side p strong { color: #333; font-weight: bold; font-size: 16px; }');
    
    // Footer styling
    iframeDoc.write('.footer { display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; background-color: #222; color: #ffffff; border-radius: 0 0 10px 10px; }');
    iframeDoc.write('.qr-code { width: 80px; height: 80px; }');
    iframeDoc.write('.footer-text { font-size: 14px; text-align: center; color: #aaa; }');
    iframeDoc.write('</style>');
    iframeDoc.write('</head><body>');
    
    // Start card content
    iframeDoc.write('<div class="card">');
    
    // Header
    iframeDoc.write('<div class="header">');
    iframeDoc.write('<img src="' + leftLogoUrl + '" class="logo" />'); // Left Logo
    iframeDoc.write('<div class="header-title">Visitor ID Card</div>'); // Title
    iframeDoc.write('<img src="' + rightLogoUrl + '" class="logo" />'); // Right Logo
    iframeDoc.write('</div>');
    
    // Main Content
    iframeDoc.write('<div class="content">');
    
    // Left Side Info
    iframeDoc.write('<div class="left-side">');
    iframeDoc.write('<p><strong>First Name :</strong> {{ $visitor->first_name }}</p>');
    iframeDoc.write('<p><strong>Last Name :</strong> {{ $visitor->last_name }}</p>');
    iframeDoc.write('<p><strong>Organization :</strong> {{ $visitor->organization }}</p>');
    iframeDoc.write('</div>');
    
    // Right Side Info
    iframeDoc.write('<div class="right-side">');
    iframeDoc.write('<p><strong>Status :</strong> {{ $score >= 2 ? "Passed" : "Failed" }}</p>');
    iframeDoc.write('<p><strong>TE ID / CNE :</strong> {{ $visitor->te_id }}</p>');
    iframeDoc.write('<p><strong>Purpose of Visit :</strong> {{ $visitor->purpose }}</p>');
    iframeDoc.write('<p><strong>Host :</strong> {{ $visitor->host }}</p>');
    iframeDoc.write('</div>');
    
    iframeDoc.write('</div>'); // Close content section

    // Footer with QR Code and Generated Date
    iframeDoc.write('<div class="footer">');
    iframeDoc.write('<img src="' + qrCodeUrl + '" class="qr-code" />'); // QR Code
    iframeDoc.write('<div class="footer-text">Generated on {{ now()->format("d-m-Y H:i") }}</div>'); // Date
    iframeDoc.write('</div>');

    iframeDoc.write('</div>'); // Close card

    iframeDoc.write('</body></html>');
    iframeDoc.close();

    setTimeout(function () {
        iframe.contentWindow.print();
        document.body.removeChild(iframe);
    }, 500);
}


        function retryQuiz() {
            window.location.href = "{{ route('visitor.video') }}";
        }
    </script>
</body>
</html>
