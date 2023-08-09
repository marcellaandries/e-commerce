<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">

                @include('livewire.user.user-order-details-payment-modal-component')
                {{-- <script>
                    $('#myModal').on('shown.bs.modal', function () {
                    $('#myInput').focus()
                    })
                </script> --}}
                <!-- Button trigger modal -->
                {{-- https://stackoverflow.com/questions/23818216/how-to-always-display-bootstrap-3-modal --}}
                <button type="button" class="btn btn-primary btn-lg mb-2" data-toggle="modal" data-target="#myModal">
                    Upload Transfer Proof
                </button>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order ID: {{$order->id}}</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.orders')}}" class="btn btn-primary pull-right">All Orders</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        $o_date = date('d-m-Y H:i:s', strtotime($order->created_at));
                        // echo $order->paid_date;
                    ?>
                    <div class="mr-3 pull-right">
                        {{-- <h5>Order ID :{{$order->id}}</h5> --}}
                        <h5>Order Date :{{$o_date}}</h5>
                    </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                {{-- Cella's note: get the Cart param from this-> vendor\hardevine\shoppingcart\src\Cart.php --}}
                                @foreach ($order->orderItems as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{$item->product->image}}" alt="{{$item->product->name}}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                    </div>
                                    <div class="price-field product-price"><p class="price">{{ $this->rupiah($item->price) }}</p></div>
                                    <div class="quantity">
                                        <h5>{{$item->quantity}}</h5>
                                    </div>
                                    {{-- <div class="price-field sub-total"><p class="price">{{ "Rp " . number_format($item['quantity'] * $item['price'],2,',','.') }}</p></div> --}}
                                    <div class="price-field sub-total"><p class="price">{{ $this->rupiah($item->price * $item->quantity) }}</p></div>

                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{ $this->rupiah($order->subtotal) }}</b></p>
                                <p class="summary-info"><span class="title">Shipping Cost</span><b class="index">{{ $this->rupiah($order->shipping_cost) }}</b></p>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{ $this->rupiah($order->total) }}</b></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Shipping Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{$order->firstname}}</td>
                                <th>Email</th>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$order->mobile}}</td>
                                <th>Address</th>
                                <td>{{$order->line1}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$order->city}}</td>
                                <th>Province</th>
                                <td>{{$order->province}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$order->country}}</td>
                                <th>Zipcode</th>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                            <tr>
                                <th>Courier</th>
                                <td>{{$order->courier}}</td>
                                <th>Service</th>
                                <td>{{$order->service}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Transaction
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{$order->transaction->mode}}
                                    <p class ="mt-12">Transfer to BCA Account : 5270881188. Bank Account Holder Name : PT Erakomp Infonusa</p>
                                </td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <?php
                                $p_date = date('d-m-Y H:i:s', strtotime($order->processed_date));
                                // echo $order->processed_date;
                            ?>
                            <tr>
                                <th>Payment Approval Date</th>
                                <td>
                                    @if($order->processed_date)
                                        {{$p_date}}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
