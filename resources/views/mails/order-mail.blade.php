<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <p>Hi, {{$order->firstname}}</p>
    <p>Thank you for your order. Your order has been successfully placed on {{$order->created_at}}.</p>

    <table style="width: 800px; text-align:right">
        <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Price Total</th>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
            <tr>
                <td><img src="{{ asset('assets/images/products') }}/{{$item->product->image}}" width="100"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{ "Rp " . number_format($item['price'],2,',','.') }}</td>
                <td>{{ "Rp " . number_format($item['quantity'] * $item['price'],2,',','.') }}</td>
                {{-- <td>{{$item->price * $item->quantity}}</td> --}}
            </tr>
            @endforeach
            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px;font-weight:bold;">Subtotal : {{ "Rp " . number_format($order['subtotal'],2,',','.') }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px;font-weight:bold;">Shipping : {{ "Rp " . number_format($order['shipping_cost'],2,',','.') }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px;font-weight:bold;">Total : {{ "Rp " . number_format($order['total'],2,',','.') }}</td>
            </tr>
        </tbody>
    </table>


    <table style=" padding: 35px; background-color: #00006c;" bgcolor="#1b9ba3" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="width: 800px; max-width:800px;">
        <tr>
            <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                <h3 style="font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;">
                    Please transfer to BCA Account : 5270881188 (PT Erakomp Infonusa) before
                    <?php
                        $day=$order->created_at;

                        // add 7 days to the date above
                        $NewDate = date('d-m-Y H:i:s', strtotime($day . " +2 days"));
                        echo $NewDate;
                    ?>
                </h3>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 25px 0 15px 0;">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" style="border-radius: 5px;" bgcolor="#eee">
                        <a href="https://www.erakomp.co.id/" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #000; text-decoration: none; border-radius: 5px; background-color: #eee; padding: 15px 30px; border: 1px solid #eee; display: block;">Shop Again</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>






</body>
</html>
