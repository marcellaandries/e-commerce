<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ordered Details
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

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
