<div>
	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Cart</span></li>
				</ul>
			</div>
			<div class=" main-content-area">

                @if(Cart::content()->count() > 0)

                    <div class="wrap-iten-in-cart">
                        @if(Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>Success</strong> {{Session::get('success_message')}}
                            </div>
                        @endif
                        @if(Cart::count() > 0)

                        <h3 class="box-title">Products Name</h3>
                        <ul class="products-cart">
                            {{-- Cella's note: get the Cart param from this-> vendor\hardevine\shoppingcart\src\Cart.php --}}
                            @foreach (Cart::content() as $item)
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                                    <p class="summary-info"><span class="title"></span class="index">{{$item->model->weight}} Gr</b></p>
                                        <p class="summary-info"><span class="title"></span class="index">{{number_format($item->model->weight * $item->qty, 0, "", ".")}} Gr</b></p>
                                </div>
                                <div class="price-field product-price"><p class="price">{{ $this->rupiah($item->model['regular_price']) }}</p></div>
                                <div class="quantity">
                                    <div class="quantity-input">
                                        <input type="text" disabled name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                        <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                        <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                                    </div>
                                </div>
                                <div class="price-field sub-total"><p class="price">{{$item->model->subtotal}}</p></div>
                                <div class="delete">
                                    <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="btn btn-delete" title="">
                                        <span>Delete from your cart</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @else
                            <p>No item in cart</p>
                        @endif
                    </div>

                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">Order Summary</h4>

                            {{-- cella --}}
                            @php
                            $weightTotal = 0;
                            foreach(Cart::content() as $item) {
                                $weightTotal += ($item->model->weight * $item->qty);
                            }
                            @endphp

                            <p class="summary-info"><span class="title">Weight Total</span><b class="index">{{number_format($weightTotal, 0, "", ".")}} gr</b></p>
                            <p class="summary-info"><span class="title">Subtotal</span><b class="index">Rp {{Cart::subtotal()}}</b></p>
                            {{-- <p class="summary-info"><span class="title">Tax</span><b class="index">Rp{{Cart::tax()}}</b></p> --}}
                            {{-- <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p> --}}
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">Rp {{Cart::total()}}</b></p>
                        </div>
                        <div class="checkout-info">
                            {{-- <label class="checkbox-field">
                                <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                            </label> --}}
                            {{-- <a class="btn btn-checkout" href="/checkout">Check out</a> --}}
                            <a class="btn btn-checkout" href="{{route('shipping')}}" wire:click.prevent="shippingCost()">Shipping</a>
                            <a class="link-to-shop" href="/shop">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                        <div class="update-clear">
                            <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                            {{-- <a class="btn btn-update" href="#">Update Shopping Cart</a> --}}
                        </div>
                    </div>

                @else
                    <div class="text-center" style="padding:30px 0;">
                        <h1>Your cart is empty!</h1>
                        <p>Add items to it now</p>
                        <a href="/shop" class="btn btn-primary">Shop Now</a>
                    </div>
                @endif

				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}" width="214" height="214') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}" width="214" height="214') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">Rp 168.000</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_15.jpg') }}" width="214" height="214') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">Rp 168.000</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_1.jpg') }}" width="214" height="214') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">Rp 2.500.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_21.jpg') }}" width="214" height="214') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">Rp 2.500.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_3.jpg') }}" width="214" height="214') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">Rp 1.680.000</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}" width="214" height="214') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">Rp 2.500.000</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_5.jpg') }}" width="214" height="214') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">Rp 2.5000.000</span></div>
								</div>
							</div>
						</div>
					</div><!--End wrap-products-->
				</div>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->

</div>
