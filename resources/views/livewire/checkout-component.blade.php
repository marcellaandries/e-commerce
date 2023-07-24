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
            <div class="wrap-address-billing">
                <h3 class="box-title">Billing Address</h3>
                <form action="#" method="get" name="frm-billing">
                    <p class="row-in-form">
                        <label for="fname">first name<span>*</span></label>
                        <input id="fname" type="text" name="fname" value="" placeholder="Your name">
                    </p>
                    <p class="row-in-form">
                        <label for="lname">last name<span>*</span></label>
                        <input id="lname" type="text" name="lname" value="" placeholder="Your last name">
                    </p>
                    <p class="row-in-form">
                        <label for="email">Email Address:</label>
                        <input id="email" type="email" name="email" value="" placeholder="Type your email">
                    </p>
                    <p class="row-in-form">
                        <label for="phone">Phone number<span>*</span></label>
                        <input id="phone" type="number" name="phone" value="" placeholder="number format">
                    </p>
                    <p class="row-in-form">
                        <label for="add">Address:</label>
                        <input id="add" type="text" name="add" value="" placeholder="Street at apartment number">
                    </p>
                    <p class="row-in-form">
                        <label for="province">Province<span>*</span></label>
                        <input id="province" type="text" name="province" value="" placeholder="Province">
                        {{-- <select name="province_id" id="province_id" class="form-control">
                            <option value="">Select Province</option>
                            @foreach ($provinsi as $row)
                            <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                            @endforeach
                        </select> --}}
                    </p>
                    <p class="row-in-form">
                        <label for="zip-code">Postcode / ZIP:</label>
                        <input id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code">
                    </p>
                    <p class="row-in-form">
                        <label for="kota_id">Town / City<span>*</span></label>
                        <input id="city" type="text" name="city" value="" placeholder="City name">
                    </p>
                    <p class="row-in-form fill-wife">
                        <label class="checkbox-field">
                            <input name="create-account" id="create-account" value="forever" type="checkbox">
                            <span>Create an account?</span>
                        </label>
                        <label class="checkbox-field">
                            <input name="different-add" id="different-add" value="forever" type="checkbox">
                            <span>Ship to a different address?</span>
                        </label>
                    </p>
                </form>
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
                    <a href="thankyou.html" class="btn btn-medium">Place order now</a>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed Rp 500.000,00</span></p>

                </div>
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
<!--main area-->
