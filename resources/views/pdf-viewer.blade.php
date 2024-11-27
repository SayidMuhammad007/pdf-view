<!DOCTYPE html>
<html>

<head>
    <title>PDF Viewer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #525659;
        }

        .pdf-container {
            width: 100%;
            height: 100vh;
            overflow: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #pdf-viewer {
            background-color: #525659;
            padding: 20px 0;
        }

        .page-container {
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            background-color: white;
        }

        canvas {
            max-width: 100%;
            height: auto !important;
        }

        .loading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <div class="pdf-container">
        <div id="pdf-viewer">
            <div class="loading">Loading PDF...</div>
        </div>
    </div>

    <script>
        // Configure PDF.js worker
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        // Get PDF file URL
        const pdfUrl = "{{ asset($pdf) }}";

        // Load and render PDF
        async function renderPDF() {
            try {
                const loadingTask = pdfjsLib.getDocument(pdfUrl);
                const pdf = await loadingTask.promise;

                // Remove loading message
                document.querySelector('.loading').style.display = 'none';

                // Render each page
                for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                    const page = await pdf.getPage(pageNum);

                    // Create container for this page
                    const pageContainer = document.createElement('div');
                    pageContainer.className = 'page-container';

                    // Create canvas for this page
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    pageContainer.appendChild(canvas);

                    // Add to viewer
                    document.getElementById('pdf-viewer').appendChild(pageContainer);

                    // Calculate viewport
                    const viewport = page.getViewport({
                        scale: 1.5
                    });

                    // Set canvas dimensions
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render PDF page
                    await page.render({
                        canvasContext: context,
                        viewport: viewport
                    }).promise;
                }
            } catch (error) {
                console.error('Error loading PDF:', error);
                document.querySelector('.loading').textContent = 'Error loading PDF. Please try again later.';
            }
        }

        // Start rendering when page loads
        renderPDF();
    </script>
</body>

</html>
