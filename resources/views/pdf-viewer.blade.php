<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDF Viewer</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
</head>
<body style="margin:0">

<div id="pdf-container" style="height:100vh; overflow:auto;"></div>

<script>
pdfjsLib.GlobalWorkerOptions.workerSrc =
"https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";

const urlParams = new URLSearchParams(window.location.search);
const pdfUrl = urlParams.get('file');

pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {

    const container = document.getElementById('pdf-container');

    for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {

        pdf.getPage(pageNum).then(function(page) {

            const canvas = document.createElement("canvas");
            const context = canvas.getContext("2d");

            const viewport = page.getViewport({ scale: 1.5 });

            canvas.height = viewport.height;
            canvas.width = viewport.width;

            container.appendChild(canvas);

            page.render({
                canvasContext: context,
                viewport: viewport
            });

        });

    }

});
</script>

</body>
</html>