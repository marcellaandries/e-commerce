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
                                            {{-- <p class="summary-info"><span class="title"></span class="index">{{$item->model->weight}} Gr</b></p> --}}
                                            <p class="summary-info"><span class="title"></span class="index">{{$item->model->weight/1000}} Kg</b></p>
                                            <p class="summary-info"><span class="title"></span class="index">Weight subtotal: {{number_format($item->model->weight/1000 * $item->qty, 0, "", ".")}} Kg</b></p>
                                            {{-- <p class="summary-info"><span class="title"></span class="index">{{number_format($item->model->weight * $item->qty, 0, "", ".")}} Gr</b></p> --}}
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
