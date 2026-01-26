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
            color: #2e3f5f;
        }

        .certificate {
            width: 1123px;
            height: 794px;
            background: url('{{ public_path("preschool-bg.png") }}') no-repeat center;
            background-size: cover;
            position: relative;
        }

        /* STUDENT NAME */
        .student-name {
            position: absolute;
            top: 270px;
            width: 100%;
            text-align: center;
            font-size: 64px;
            font-family: "DejaVu Serif", serif;
            font-weight: normal;
            color: #2f2f2f;
        }

        /* PROGRAM TEXT */
        .program-text {
            position: absolute;
            top: 390px;
            width: 100%;
            text-align: center;
            font-size: 22px;
            line-height: 1.6;
        }

        .program-name {
            font-size: 30px;
            font-weight: bold;
            color: #b08a2e;
        }
    </style>
</head>

<body>

<div class="certificate">

    <!-- STUDENT NAME -->
    <div class="student-name">
        {{ $name }}
    </div>

    <!-- PROGRAM INFO -->
    <div class="program-text">
        has successfully completed the program of study for<br>
        <span class="program-name">{{ $program_name }}</span><br>
        at Hi Academy International Preschool<br>
        Academic Year: {{ $academic_year }}<br>
        Date of Completion: {{ \Carbon\Carbon::parse($completion_date)->format('F d, Y') }}
    </div>

</div>

</body>
</html>
