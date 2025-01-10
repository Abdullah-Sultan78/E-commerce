<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        .invoice-box {
            width:100%
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }


        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img
                              {{-- <img  src="{{asset('/')}}upload/pakhi,jpg" style="width:100px"> --}}
                                    src="https://sparksuite.github.io/simple-html-invoice-template/images/logo.png"
                                    style="width: 100%; max-width: 300px"
                                />
                            </td>

                            <td>
                                Invoice #: 00{{$order->id}}<br />
                                Order Date: {{$order->order_date}}<br />
                                Invoice Date: {{date('Y-m-d')}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                Company Information<br />
                                Abdullah Sultan<br />
                                Abed Dhali Road<br />
                                Kalabagan, Dhaka 1206
                            </td>

                            <td>
                                Delivery Information<br />
                                {{$order->customer->name}}<br />
                                {{$order->customer->mobile}}<br />
                                {{$order->delivery_address}}.<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>

                <td colspan="3">Check #</td>
            </tr>

            <tr class="details">
                <td>{{$order->payment_type == 1? 'Cash' :'Online'}}</td>

                <td colspan="3">${{$order->order_total}}</td>
            </tr>

            <tr class="heading">
                <td>Item</td>
                <td style="text-align:center;">Price</td>
                <td  style="text-align:center;">Qty</td>
                <td  style="text-align: right;">Total</td>
            </tr>
            @php($sum  = 0)
            @foreach ($order->orderDetails as $orderDetail)


            <tr class="item">
                <td>{{$orderDetail->product_name}}</td>

                <td style="text-align:center;">${{$orderDetail->product_price}}</td>
                <td style="text-align:center;">{{$orderDetail->product_qty}}</td>
                <td style="text-align: right;">${{$orderDetail->product_price * $orderDetail->product_qty}}</td>
            </tr>
            @endforeach
            @php($sum = $sum +($orderDetail->product_price * $orderDetail->product_qty))

            <tr class="total">
                <td colspan="4"><hr></td>
            </tr>
            <tr class="total">
                <td colspan="3">Order SubTotal</td>
                <td> ${{$sum}}</td>
            </tr>

            <tr class="total">
                <td colspan="3">Tax Total</td>
                <td>${{$order->tax_total}}</td>
            </tr>
            <tr class="total">
                <td colspan="3">Shipping Total</td>
                <td>${{$order->shipping_total}}</td>
            </tr>

            <tr class="total">
                <td colspan="4"><hr></td>
            </tr>
            <tr class="total">
                <td colspan="3">Total Payable</td>
                <td>${{$order->order_total}}</td>
            </tr>

            <tr align="center">
                <td style="width:200px;">
                   <br>
                    Prepared By
                    <hr>
                    </td>
            <td colspan="2"></td>
                <td style="width:200px;">
                    <br>
                    Received By
                    <hr>
                </td>

            </tr>
        </table>
    </div>

</body>
</html>
