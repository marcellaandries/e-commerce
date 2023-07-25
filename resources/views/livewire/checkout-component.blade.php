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
            <form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            {{-- <form action="#" method="get" name="frm-billing"> --}}
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:mode="firstname">
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:mode="lastname">
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Address:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:mode="email">
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="number format" wire:mode="mobile">
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Address (line 1):</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:mode="line1">
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Address (line 2):</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:mode="line2">
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country</label>
                                    <input disabled type="text" name="country" value="Indonesia" placeholder="Country" wire:mode="country">
                                </p>
                                <p class="row-in-form">
                                    <label for="province">Province<span>*</span></label>
                                    <input disabled type="text" id="province" name="province" value="" placeholder="Province" wire:mode="province">
                                    {{-- <select name="province_id" id="province_id" class="form-control">
                                        <option value="">Select Province</option>
                                        @foreach ($provinsi as $row)
                                        <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                                        @endforeach
                                    </select> --}}
                                </p>
                                <p class="row-in-form">
                                    <label for="kota_id">Town / City<span>*</span></label>
                                    <input disabled id ="city" type="text" name="city" value="" placeholder="City name" wire:mode="city">
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:mode="zipcode">
                                </p>
                                <p class="row-in-form fill-wife">
                                    {{-- <label class="checkbox-field">
                                        <input name="create-account" id="create-account" value="forever" type="checkbox">
                                        <span>Create an account?</span>
                                    </label> --}}
                                    <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                        <span>Ship to a different address?</span>
                                    </label>
                                </p>
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
                                        <input type="text" name="fname" value="" placeholder="Your name" wire:mode="s_firstname">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lname">last name<span>*</span></label>
                                        <input type="text" name="lname" value="" placeholder="Your last name" wire:mode="s_lastname">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Email Address:</label>
                                        <input type="email" name="email" value="" placeholder="Type your email" wire:mode="s_email">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Phone number<span>*</span></label>
                                        <input type="number" name="phone" value="" placeholder="number format" wire:mode="s_mobile">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Address (line 1):</label>
                                        <input type="text" name="add" value="" placeholder="Street at apartment number" wire:mode="s_line1">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Address (line 2):</label>
                                        <input type="text" name="add" value="" placeholder="Street at apartment number" wire:mode="s_line2">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Country</label>
                                        <input disabled type="text" name="country" value="Indonesia" placeholder="Country" wire:mode="s_country">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="province">Province<span>*</span></label>
                                        <input disabled id ="s_province" type="text" name="province" value="" placeholder="Province" wire:mode="s_province">
                                        {{-- <select name="province_id" id="province_id" class="form-control">
                                            <option value="">Select Province</option>
                                            @foreach ($provinsi as $row)
                                            <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                                            @endforeach
                                        </select> --}}
                                    </p>
                                    <p class="row-in-form">
                                        <label for="kota_id">Town / City<span>*</span></label>
                                        <input disabled id ="s_city" type="text" name="city" value="" placeholder="City name" wire:mode="s_city">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Postcode / ZIP:</label>
                                        <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:mode="s_zipcode">
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
                        <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="bank" type="radio">
                                <span>Bank Transder</span>
                                <span class="payment-desc">BCA Account : 5270881188</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-visa" value="visa" type="radio">
                                <span>Midtrans</span>
                                <span class="payment-desc">Midtrans Credit Card</span>
                            </label>
                            {{-- <label class="payment-method">
                                <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label> --}}
                        </div>
                        <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">Rp 1.000.000</span></p>
                        <button type="submit" class="btn btn-medium">Place order now</button>
                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        {{-- <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed Rp 50.000,00</span></p> --}}

                        <p class="summary-info"><label for="courier">Courier: </label><span class="title"><input class="uppercase" disabled type="text" id="courier" name="courier" value="" placeholder="Courier" wire:mode="courier"></span></p>
                        <p class="summary-info"><label for="service">Service / ZIP: </label><span class="title"><input class ="textlabel" disabled type="text" id="service" name="service" value="" placeholder="Service" wire:mode="service"></span></p>
                        <p class="summary-info"><label for="shipping_cost">Shipping Cost:</label><span class="title"><input class ="textlabel" disabled type="text" id="shipping_cost" name="shipping_cost" value="" placeholder="Shipping Cost" wire:mode="shipping_cost"></span></p>
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="hss_id" nama="hss_id" placeholder="ini untuk menangkap id ">
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="hss_province" nama="hss_province" placeholder="ini untuk menangkap province ">
                </div>

            </form>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
<!--main area-->

</div>
