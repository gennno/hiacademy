<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $receipt->receipt_number }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .container { width: 100%; }

        .header { width: 100%; margin-bottom: 20px; }
        .header td { vertical-align: top; }

        .logo { width: 235px; }

        .company-info {
            text-align: right;
            font-size: 11px;
        }

        .receipt-info { margin: 20px 0; }

        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table.items th,
        table.items td {
            border: 1px solid #000;
            padding: 8px;
        }

        table.items th {
            background: #f2f2f2;
        }

        .text-right { text-align: right; }

        .summary { width: 100%; margin-top: 15px; }
        .summary td { padding: 6px; }

        .notice { margin-top: 30px; font-size: 11px; }

        .footer {
            margin-top: 15px;
            font-size: 10px;
            color: #555;
        }
        .paid-stamp {
            display: inline-block;
            margin-top: 1px;
            padding: 10px 15px;
            border: 3px solid #ee5143;
            color: #ee5143;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 3px;
            transform: rotate(-5deg);
        }
    </style>
</head>

<body>
<div class="container">

    <!-- HEADER -->
    <table class="header">
        <tr>
            <td>
                <img src="img/logogelap.png" class="logo">
            </td>
            <td class="company-info">
                <strong>H!Academy</strong><br>
                Komplek Ruko Grand Niaga Mas A No 61-62<br>
                Batam - Center, Kepri - Indonesia<br>
                +62 778 4888 111<br>
                no-reply@hiacademy.id
            </td>
        </tr>
    </table>

    <hr>

    <!-- RECEIPT INFO -->
    <table class="receipt-info" width="100%">
        <tr>
            <td width="60%">
                <strong>RECEIPT TO:</strong><br>
                {{ $receipt->customer_name }}<br>
                {{ $receipt->customer_address }}<br>
                {{ $receipt->customer_email }}
            </td>
            <td width="40%">
                <strong>{{ $receipt->receipt_number }}</strong><br>
                Receipt Date: {{ $receipt->receipt_date->format('d/M/Y') }}<br>
                Invoice Ref: {{ $receipt->invoice_number }}
            </td>
        </tr>
    </table>

    <!-- ITEMS -->
    <table class="items">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="20%">PROGRAM</th>
                <th width="55%">DESCRIPTION</th>
                <th width="20%" class="text-right">AMOUNT</th>
            </tr>
        </thead>

        <tbody>
        @foreach($receipt->items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->program_name }}</td>
                <td>
                    {{ $item->level }}<br>
                    <small>{{ $item->description }}</small>
                </td>
                <td class="text-right">
                    IDR {{ number_format($item->paid_amount, 0, ',', '.') }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

<!-- SUMMARY + PAID STAMP -->
<table class="summary">
    <tr>
        <td width="75%" class="text-right">
            <strong>TOTAL</strong>
        </td>
        <td width="25%" class="text-right">
            <strong>
                IDR {{ number_format($receipt->total_paid, 0, ',', '.') }}
            </strong>
        </td>
    </tr>

    <!-- PAID STAMP ROW -->
    <tr>
        <td></td>
        <td class="text-right">
            <div class="paid-stamp">
                PAID
            </div>
        </td>
    </tr>
</table>
    <p style="margin-top:20px;"><strong>Thank you!</strong></p>

    <div class="notice">
        <strong>NOTICE:</strong><br>
        This receipt confirms payment received.
    </div>

    <hr>

    <div class="footer">
        Receipt was created electronically and is valid without signature.
    </div>

</div>
</body>
</html>
