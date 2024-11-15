<!DOCTYPE html>
<html>

<head>
    <title>PDF Viewer</title>
    <style>
        .pdf-container {
            width: 100%;
            height: 100vh;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
    <div class="pdf-container">
        <iframe src="{{ asset('file.pdf') }}" type="application/pdf"></iframe>
    </div>
</body>

</html>
