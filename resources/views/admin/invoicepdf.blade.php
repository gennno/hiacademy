<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $invoice->invoice_number }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .container {
            width: 100%;
        }

        .header {
            width: 100%;
            margin-bottom: 20px;
        }

        .header td {
            vertical-align: top;
        }

        .logo {
            width: 235px;
        }

        .company-info {
            text-align: right;
            font-size: 11px;
        }

        .invoice-info {
            margin: 20px 0;
        }

        .invoice-info td {
            vertical-align: top;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

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

        .text-right {
            text-align: right;
        }

        .summary {
            width: 100%;
            margin-top: 15px;
        }

        .summary td {
            padding: 6px;
        }

        .notice {
            margin-top: 30px;
            font-size: 11px;
        }

        .footer {
            margin-top: 15px;
            font-size: 10px;
            color: #555;
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
                    Jl. Abuyaltama komplek papa mama residence B 20-22A <br>
                    Batam, Riau, Indonesia - 29464<br>
                    +62 853-7329-6248<br>
                    info@hiacademy.id
                </td>
            </tr>
        </table>
        <hr>
        <!-- INVOICE INFO -->
        <table class="invoice-info" width="100%">
            <tr>
                <td width="60%">
                    <strong>INVOICE TO:</strong><br>
                    {{ $invoice->customer_name }}<br>
                    {{ $invoice->customer_address }}<br>
                    {{ $invoice->customer_email }}
                </td>
                <td width="40%">
                    <strong>{{ $invoice->invoice_number }}</strong><br>
                    Invoice Date: {{ $invoice->invoice_date->format('d/M/Y') }}<br>
                    Outlet: h!academy
                </td>
            </tr>
        </table>

        <!-- ITEMS -->
        <table class="items">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="15%">PROGRAM</th>
                    <th width="55%">DESCRIPTION</th>
                    <th width="25%" class="text-right">TOTAL</th>
                </tr>
            </thead>
<tbody>
@foreach($invoice->items as $index => $item)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $item->program_name }}</td>
        <td>
            {{ $item->level }}<br>
            <small>{{ $item->description }}</small>
        </td>
        <td class="text-right">
            @if($item->amount == 0)
                <strong>FREE</strong>
            @else
                IDR {{ number_format($item->amount, 0, ',', '.') }}

                @if($item->discount_amount > 0)
                    <br>
                    <small style="color:red;">
                        - IDR {{ number_format($item->discount_amount, 0, ',', '.') }}
                    </small>
                @endif
            @endif
        </td>

    </tr>
@endforeach
</tbody>

        </table>

        <!-- SUMMARY -->
<table class="summary">
    <tr>
        <td width="75%" class="text-right"><strong>SUBTOTAL</strong></td>
        <td width="25%" class="text-right">
            IDR {{ number_format($invoice->subtotal, 0, ',', '.') }}
        </td>
    </tr>

    <tr>
        <td class="text-right"><strong>DISC.</strong></td>
        <td class="text-right" style="color:red;">
            - IDR {{ number_format($invoice->total_discount, 0, ',', '.') }}
        </td>
    </tr>

    <tr>
        <td class="text-right"><strong>GRAND TOTAL</strong></td>
        <td class="text-right">
            <strong>
                IDR {{ number_format($invoice->grand_total, 0, ',', '.') }}
            </strong>
        </td>
    </tr>
</table>


        <!-- THANK YOU -->
        <p style="margin-top:20px;"><strong>Thank you!</strong></p>

        <!-- NOTICE -->
        <div class="notice">
            <strong>NOTICE:</strong><br>
            Payment can be made by transfer via:<br>
            Mandiri a/c 10900 79737 888<br>
            an. PT THOMAS CONSULTING GROUP
        </div>
        <hr>
        <!-- FOOTER -->
        <div class="footer">
            Invoice was created on a computer and is valid without the signature and seal.
        </div>
    </div>

</body>

</html>