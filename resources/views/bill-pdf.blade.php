<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        h4 {
            margin: 0;
        }

        .w-full {
            width: 100%;
        }

        .w-half {
            width: 50%;
        }

        .margin-top {
            margin-top: 1.25rem;
        }

        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table.bills {
            font-size: 0.875rem;
        }

        table.bills tr {
            background-color: rgb(96 165 250);
        }

        table.bills th {
            color: #ffffff;
            padding: 0.5rem;
        }

        table tr.items {
            background-color: rgb(241 245 249);
        }

        table tr.items td {
            text-align: center;
            padding: 0.5rem;
            border-bottom: 1px #3b3b3b;
        }

        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <table class="w-full">
        <tr>
            <td class="w-full">
                <h2>Payment History</h2>
            </td>
        </tr>
        
        <tr class="w-full" style="text-align: right;">
            <td>
                <small style="margin: 0; padding: 0;" class="">{{ $dateToday }}</small>
            </td>
        </tr>
    </table>

    <div class="margin-top">
        <table class="bills">
            <tr>
                <th>Date</th>
                <th>Fullname</th>
                <th>Type</th>
                <th>Method</th>
                <th>Amount</th>
            </tr>

            @foreach ($bill as $item)
                <tr class="items">
                    <td>{{ date('j/d/Y h:i a', strtotime($item->created_at)) }}</td>
                    <td>{{ $item->student->first_name . ' ' . $item->student->middle_name . ' ' . $item->student->last_name }}
                    </td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->payment_method }}</td>
                    <td>
                        <span style="font-family: DejaVu Sans; sans-serif;">&#8369;</span>
                        {{ $item->amount }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="total">
        Total: <span style="font-family: DejaVu Sans; sans-serif;">&#8369;</span>{{ $total }}
    </div>

</body>

</html>
