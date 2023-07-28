<div>
<!--main area-->
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            {{-- <form> --}}
                <form action="{{ route('place.order') }}" method="post"
                enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Address</h3>
                            {{-- <form action="#" method="get" name="frm-billing"> --}}
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" id ="firstname" name="firstname" value="" placeholder="Your name" wire:model="firstname">
                                    @error('firstname') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" name="lastname" value="" placeholder="Your last name" wire:model="lastname">
                                    @error('lastname') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Address:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                    @error('email') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="mobile" value="" placeholder="number format" wire:model="mobile">
                                    @error('mobile') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Address (line 1):</label>
                                    <input type="text" name="line1" value="" placeholder="Street at apartment number" wire:model="line1">
                                    @error('line1') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Address (line 2):</label>
                                    <input type="text" name="line2" value="" placeholder="Street at apartment number" wire:model="line2">
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country</label>
                                    <input type="text" readonly name="country" value="Indonesia" placeholder="Country">
                                </p>
                                <p class="row-in-form">
                                    <label for="province">Province<span>*</span></label>
                                    <input type="text" readonly id="province" name="province" value="" placeholder="Province" wire:model="province">
                                    {{-- <select name="province_id" id="province_id" class="form-control">
                                        <option value="">Select Province</option>
                                        @foreach ($provinsi as $row)
                                        <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                                        @endforeach
                                    </select> --}}
                                </p>
                                <p class="row-in-form">
                                    <label for="kota_id">Town / City<span>*</span></label>
                                    <input type="text" readonly id ="city"  name="city" value="" placeholder="City" wire:model="city">
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" name="zipcode" value="" placeholder="Your postal code" wire:model="zipcode">
                                    @error('zipcode') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </p>
                                <div hidden>
                                    <p class="row-in-form fill-wife">
                                        {{-- <label class="checkbox-field">
                                            <input name="create-account" id="create-account" value="forever" type="checkbox">
                                            <span>Create an account?</span>
                                        </label> --}}
                                        <label class="checkbox-field">
                                            <input name="ship_to_different" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                            <span>Ship to a different address?</span>
                                        </label>
                                    </p>
                                </div>

                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>

                    @if($ship_to_different)
                        <div class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Shipping Address</h3>
                                {{-- <form action="#" method="get" name="frm-billing"> --}}
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">first name<span>*</span></label>
                                        <input type="text" name="s_firstname" value="" placeholder="Your name" wire:model="s_firstname">
                                        @error('s_firstname') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lname">last name<span>*</span></label>
                                        <input type="text" name="s_lastname" value="" placeholder="Your last name" wire:model="s_lastname">
                                        @error('s_lastname') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Email Address:</label>
                                        <input type="email" name="s_email" value="" placeholder="Type your email" wire:model="s_email">
                                        @error('s_email') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Phone number<span>*</span></label>
                                        <input type="number" name="s_mobile" value="" placeholder="number format" wire:model="s_mobile">
                                        @error('s_mobile') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Address (line 1):</label>
                                        <input type="text" name="s_line1" value="" placeholder="Street at apartment number" wire:model="s_line1">
                                        @error('s_line1') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Address (line 2):</label>
                                        <input type="text" name="s_line2" value="" placeholder="Street at apartment number" wire:model="s_line2">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Country</label>
                                        <input readonly type="text" readonly name="s_country" value="Indonesia" placeholder="Country">
                                    </p>

                                    <p class="row-in-form">
                                        <label for="province">Province<span>*</span></label>
                                        <input readonly id ="s_province" type="text" name="s_province" value="" placeholder="Province" wire:model="s_province">
                                        {{-- <select name="province_id" id="province_id" class="form-control">
                                            <option value="">Select Province</option>
                                            @foreach ($provinsi as $row)
                                            <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                                            @endforeach
                                        </select> --}}
                                    </p>
                                    <p class="row-in-form">
                                        <label for="kota_id">Town / City<span>*</span></label>
                                        <input readonly id ="s_city" type="text" name="s_city" value="" placeholder="City name" wire:model="s_city">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Postcode / ZIP:</label>
                                        <input type="number" name="s_zipcode" value="" placeholder="Your postal code" wire:model="s_zipcode">
                                        @error('s_zipcode') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        {{-- <p class="summary-info"><span class="title">Check / Money order</span></p> --}}
                        <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="paymentmode" id="payment-method-bank" value="bank" type="radio" wire:model="paymentmode">
                                <span>Bank Transder</span>
                                <span class="payment-desc">BCA Account : 5270881188</span>
                            </label>
                            <label class="payment-method">
                                <input name="paymentmode" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
                                <span>Credit Card</span>
                                <span class="payment-desc">Via Midtrans</span>
                            </label>
                            @error('paymentmode') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                            {{-- <label class="payment-method">
                                <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label> --}}
                        </div>
                        <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price"><input class="textlabel" readonly type="text" id="total" name="total" value="" placeholder="Total" wire:model="total"></span></p>
                        {{-- <button type="submit" class="btn btn-medium" wire:click.prevent="placeOrder()">Place order now</button> --}}
                        <button type="submit" class="btn btn-medium">Place order now</button>
                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        {{-- <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed Rp 50.000,00</span></p> --}}

                        <p class="summary-info"><label for="courier">Courier: </label><span class="title"><input class="uppercase" readonly type="text" id="courier" name="courier" value="" placeholder="Courier" wire:model="courier"></span></p>
                        <p class="summary-info"><label for="service">Service: </label><span class="title"><input class ="textlabel" readonly type="text" id="service" name="service" value="" placeholder="Service" wire:model="service"></span></p>
                        <p hidden class="summary-info"><label for="shipping_cost">Shipping Cost:</label><span class="title"><input class ="textlabel" readonly type="text" id="shipping_cost" name="shipping_cost" value="" placeholder="Shipping Cost" wire:model="shipping_cost"></span></p>
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="hss_id" nama="hss_id" placeholder="ini untuk menangkap id ">
                </div>

                {{-- <div class="form-group">
                    <input type="text" class="form-control" id="hss_province" nama="hss_province" placeholder="ini untuk menangkap province ">
                </div> --}}

            </form>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
<!--main area-->

</div>
