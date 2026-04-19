<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
@php
$fontPath = isset($pdf)
    ? public_path('fonts/GreatVibes-Regular.ttf')
    : asset('fonts/GreatVibes-Regular.ttf');
@endphp
@php
$nameTop = isset($pdf) ? 285 : 300;
@endphp
<style>
@font-face {
    font-family: 'Great Vibes';
    src: url("{{ $fontPath }}") format("truetype");
}
@page {
    margin: 0;
}
body{
    margin:0;
    padding:0;
}

.container{
    position:relative;
    width:1122px;
    height:793px;
}

/* background certificate */
.bg{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    display:block;
}

/* student name */
.name{
    position:absolute;
    top: {{ $nameTop }}px;
    width:100%;
    text-align:center;
    font-size:80px;
    font-family:'Great Vibes';
    line-height:1;
    margin:0;
    padding:0;
}

/* description line */
.desc{
    position:absolute;
    top:410px;
    width:100%;
    text-align:center;
    font-size:24px;
}

/* program name */
.program{
    position:absolute;
    top:445px;
    width:100%;
    text-align:center;
    font-size:34px;
    font-weight:bold;
    color:#b8962e;
}

/* school name */
.school{
    position:absolute;
    top:490px;
    width:100%;
    text-align:center;
    font-size:24px;
}

/* academic year */
.year{
    position:absolute;
    top:520px;
    width:100%;
    text-align:center;
    font-size:22px;
}

/* completion date */
.date{
    position:absolute;
    top:545px;
    width:100%;
    text-align:center;
    font-size:22px;
}

</style>
</head>

<body>

<div class="container">
@php
$bgPath = isset($pdf) 
    ? public_path('certificates/preschool-bg.png') 
    : asset('certificates/preschool-bg.png');
@endphp

<img src="{{ $bgPath }}" class="bg">

    <!-- STUDENT NAME -->
<div class="name">
    {{ $certificate->name }}
</div>

<!-- DESCRIPTION -->
<div class="desc">
    has successfully completed the program of study for
</div>

<!-- PROGRAM -->
<div class="program">
    {{ $certificate->program_name }}
</div>

<!-- SCHOOL -->
<div class="school">
    at Hi Academy International Preschool
</div>

<!-- ACADEMIC YEAR -->
<div class="year">
    Academic Year: {{ $certificate->academic_year }}
</div>

<!-- COMPLETION DATE -->
<div class="date">
    Date of Completion: {{ $certificate->formatted_completion_date }}
</div>

</div>

</body>
</html>