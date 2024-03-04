<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Transaksi</title>

    <?php
    $style = '
    <style>
        * {
            font-family: "consolas", sans-serif;
        }
        p {
            display: block;
            margin: 3px;
            font-size: 10pt;
        }
        table td {
            font-size: 9pt;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        @media print {
            @page {
                margin: 0;
                size: 75mm ';
    ?>
    <?php
    $style .=
        !empty($_COOKIE['innerHeight'])
        ? $_COOKIE['innerHeight'] . 'mm; }'
        : '}';
    ?>
    <?php
    $style .= '
        html, body {
            width: 70mm;
        }
        .btn-print {
            display: none;
        }
    }
    </style>
    ';
    ?>
    {!! $style !!}
</head>

<!-- Tampilan Nota -->
<body onload="window.print()">
    <button class="btn-print" style="position: absolute; right: 1rem; top: rem;" onclick="window.print()">Print</button>
    <div class="text-center">
        <h3 style="margin-bottom: 5px;">NARS Cosmetics</h3>
        <p>Cornelia Street No. 22</p>
    </div>
    <br>
    <div>
        <p style="float: left;">{{ date('d-m-Y') }}</p>
        <p style="float: right">{{ strtoupper(auth()->user()->name) }}</p>
    </div>
    <p class="text-center">===================================</p>
    <div class="clear-both" style="clear: both;"></div>
    <p style="float: left;">No Transaksi </p>
    @foreach ($order->transactions as $transaction)
    <p style="float: right;">{{ $transaction->order->id }}</p>
    <p class="text-center">===================================</p>
    <table width="100%" style="border: 0;">
        <tr>
            <td colspan="3">{{ $transaction->product->name }}</td>
        </tr>
        <tr>
            <td>{{ $transaction->amount }} x {{ $transaction->product->price}}</td>
            <td></td>
            <td class="text-right">{{$transaction->product->price *
                    $transaction->amount }}</td>
        </tr>
    </table>

    <p class="text-center">-----------------------------------</p>
    <table width="100%" style="border: 0;">
        <tr>
            <td>Total Price</td>
            <td class="text-right">{{ $transaction->product->price * $transaction->amount }}</td>
                    @if ($transaction->product->price >= 200000)
                            @php
                                $discount = 0.1 * $transaction->product->price * $transaction->amount;
                                $disc = '10%';
                            @endphp
                        @else
                            @php
                            $discount = 0;
                            $disc = '0';
                            @endphp
                        @endif
                        @php
                            $total_payment = $transaction->product->price * $transaction->amount - $discount ;
                        @endphp
        </tr>
        <tr>
            <td>Discount</td>
            <td class="text-right">{{ $discount }}</td>
        </tr>
        <tr>
            <td>Discount Amount</td>
            <td class="text-right">{{ $disc }}</td>
        </tr>
        <tr>
            <td>Total Payment</td>
            <td class="text-right">{{ $total_payment }}</td>
        </tr>
        @endforeach
    </table>
    <p class="text-center">===================================</p>
    <p class="text-center">-- THANK YOU --</p>
    <p class="text-center">===================================</p>
    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
            body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight
        );
        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00UTC;path = ;";
        document.cookie = "innerHeight=" + ((height + 50) * 0.264583);
    </script>
</body>

</html>



{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Transaksi</title>

    <?php
    $style = '
    <style>
        * {
            font-family: "consolas", sans-serif;
        }
        p {
            display: block;
            margin: 3px;
            font-size: 10pt;
        }
        table td {
            font-size: 9pt;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        @media print {
            @page {
                margin: 0;
                size: 75mm ';
    ?>
    <?php
    $style .=
        !empty($_COOKIE['innerHeight'])
        ? $_COOKIE['innerHeight'] . 'mm; }'
        : '}';
    ?>
    <?php
    $style .= '
        html, body {
            width: 70mm;
        }
        .btn-print {
            display: none;
        }
    }
    </style>
    ';
    ?>
    {!! $style !!}
</head>

<body onload="window.print()">
    <button class="btn-print" style="position: absolute; right: 1rem; top: 1rem;" onclick="window.print()">Print</button>
    <div class="text-center">
        <h3 style="margin-bottom: 5px;">`DANILA COFFE</h3>
        <p>Jalan SUKAJADI No. 09</p>
    </div>
    <br>
    <div>
        <p style="float: left;">{{ date('d-m-Y') }}</p>
        <p style="float: right">{{ strtoupper(auth()->user()->name) }}</p>
    </div>
    <p class="text-center">===================================</p>
    <div class="clear-both" style="clear: both;"></div>
    <p style="float: left;">No </p>
    @foreach ($order->transactions as $transaction)
    @php
    $total_price = 0;
    $price = 0;
    $amount = 0;
    $disc = '0';
    $discount = 0;
    $total_diskon = 0;
    @endphp
    
    <p style="float: right;">{{ $order->id }}</p>
    <p class="text-center">===================================</p>
    <table width="100%" style="border: 0;">
        <tr>
            <td colspan="3">{{ $transaction->product->name }}</td>
        </tr>
        <tr>
            <td>{{ $transaction->amount }} x {{ $transaction->product->price}}</td>
            
            <td class="text-right">{{$transaction->product->price * $transaction->amount }}</td>
        </tr>
    </table>
    @php
    $total_price += $transaction->product->price * $transaction->amount;
    @endphp
    <p class="text-center">-----------------------------------</p>
    <table width="100%" style="border: 0;">
        <tr>
            <td>Total Harga</td>
            <td class="text-right">{{ $price * $amount }}</td>
            @if ($total_price >= 20000)
            @php
                $discount = 0.1 * $total_price;
                $disc = '10%';
            @endphp
            @else
            @php
                $discount = 0;
                $disc = '0';
            @endphp   
            @endif
            @php
                $total_diskon = $total_price - $discount
            @endphp  
                        @php
                            $total_diskon = $total_price - $discount;
                        @endphp

            <div class="text-right">

            </div>
            <p>Besaran Diskon</p>
            <p class="text-right">{{ $disc }} </p>
            <p>Diskon</p>
            <p class="text-right">{{ $discount }}</p>
            <p>Total Bayar</p>
            <p class="text-right">{{$total_diskon}}</p>
            
        </tr>
        @endforeach
    </table>
    <p class="text-center">===================================</p>
    <p class="text-center">-- TERIMA KASIH --</p>
    <p class="text-center">===================================</p>
    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max( 
            body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight
        );
        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00UTC;path = ;";
        document.cookie = "innerHeight=" + ((height + 50) * 0.264583);
    </script>
</body>

</html> --}}