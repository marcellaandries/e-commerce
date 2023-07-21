<div class="wrap-icon-section minicart">
    <a href="/cart" class="link-direction">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <div class="left-info">
            {{-- @if (Cart::content()->count() > 0) --}}
                <span class="index">{{Cart::content()->count()}} items</span>
            {{-- @endif --}}
            <span class="title">CART</span>
        </div>
    </a>
</div>
