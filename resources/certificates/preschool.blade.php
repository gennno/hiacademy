<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Certificate of Completion</title>

    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "DejaVu Sans", sans-serif;
        }

        .certificate {
            width: 1123px;
            height: 794px;
            background: url('{{ public_path("certificates/preschool-bg.png") }}') no-repeat center;
            background-size: cover;
            position: relative;
        }

        /* NAME */
        .student-name {
            position: absolute;
            top: 360px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 56px;
            font-weight: bold;
            color: #d4a437;
            font-family: "DejaVu Serif", serif;
        }

        /* LINE UNDER NAME */
        .name-line {
            position: absolute;
            top: 430px;
            left: 15%;
            width: 70%;
            height: 2px;
            background-color: #444;
        }

        /* PROGRAM TEXT */
        .program-text {
            position: absolute;
            top: 460px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 22px;
            color: #333;
        }

        /* SIGNATURE */
        .signature {
            position: absolute;
            bottom: 160px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .signature-name {
            font-size: 16px;
            font-weight: bold;
        }

        .signature-title {
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="certificate">5

    <!-- STUDENT NAME -->
    <div class="student-name">
        {{ $studentName }}
    </div>

    <div class="name-line"></div>

    <!-- PROGRAM -->
    <div class="program-text">
        For successfully completing the
        <strong>{{ $programName }}</strong>
    </div>

    <!-- SIGNATURE -->
    <div class="signature">
        <div style="margin-bottom:6px;">
            <img src="{{ public_path('certificates/signature.png') }}" height="50">
        </div>

        <div class="signature-name">THOMAS TAN</div>
        <div class="signature-title">CEO of Hiacademy</div>
    </div>

</div>

</body>
</html>
