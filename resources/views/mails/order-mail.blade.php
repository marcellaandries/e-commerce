<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    {{-- <p>Hi, {{$order->firstname}}</p> --}}
    <p>Hi</p>
    <p>Your order has been successfully placed.</p>

    <table style="width: 600px; text-align:right">
        <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
            <tr>
                {{-- <td><img src="{{ asset('assets/images/products') }}/{{$item->$product->image}}" width="100"></td> --}}
                <td>{{$item->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price * $item->quantity}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px;font-weight:bold;">Subtotal : ${{$order->subtotal}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px;font-weight:bold;">Shipping : Free Shipping</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px;font-weight:bold;">Total : ${{$order->total}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
