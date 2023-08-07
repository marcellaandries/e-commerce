<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px; 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Orders
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>OrderId</th>
                                    {{-- <th>Subtotal</th> --}}
                                    {{-- <th>Shipping</th> --}}
                                    <th>Total</th>
                                    <th>First Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    {{-- <th>Zipcode</th> --}}
                                    <th>Status</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    {{-- <td>{{ "Rp " . number_format($order['subtotal'],2,',','.') }}</td> --}}
                                    {{-- <td>{{ "Rp " . number_format($order['shipping_cost'],2,',','.') }}</td> --}}
                                    <td>{{ "Rp " . number_format($order['total'],2,',','.') }}</td>
                                    <td>{{$order->firstname}}</td>
                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->email}}</td>
                                    {{-- <td>{{$order->zipcode}}</td> --}}
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
