<div>
    <!--main area-->
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><a href="#" class="link"><span>Add Address</span></a></li>
            </ul>
        </div>

        <div class=" main-content-area">
            {{-- <div class="wrap-address-billing"> --}}
                <h3 class="box-title" style="font-size: 14px;"><b>ADD ADDRESS</b></h3>

                {{-- cella --}}
                {{-- <form class="ps-checkout__form" action="" method="post"> --}}
                <form class="ps-checkout__form" action="{{ route('check.out') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">

                        {{-- cella --}}
                        <div class="form-group form-group--inline">
                            <label for="provinsi">Province<span>*</span></label>
                            <select name="province_id" id="province_id" class="form-control">
                            <option value="">Select Province</option>
                            @foreach ($provinsi as $row)
                            <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                            @endforeach
                            </select>
                        </div>
                        {{-- cella --}}
                        <div class="form-group">
                            <input type="hidden" readonly class="form-control" id="nama_provinsi" nama="nama_provinsi" placeholder="province name ">
                        </div>


                        <div class="form-group ">
                        <label>Town / City<span>*</span>
                        </label>
                        <select name="kota_id" id="kota_id" class="form-control">
                        <option value="">Choose City</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <input type="hidden" readonly class="form-control" id="nama_kota" nama="nama_kota" placeholder="city name">
                        </div>
                        <div class="form-group ">

                            <label>Postcode / ZIP<span>*</span>
                            </label>
                            <input type="text" name="kode_pos" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">

                        <label>Cart Total<span>*</span>
                        </label>
                            <input type="text" readonly id="totalbelanja" name="totalbelanja" value="Rp {{Cart::subtotal()}}" class="form-control" >
                        </div>

                            <div class="form-group ">
                                <label>First Name</label>
                                <input class="form-control" type="text" id="fname" name="fname">
                            </div>

                            <div class="form-group " hidden>
                                <label>Province Name</label>
                                <input class="form-control" type="text" readonly id="province_name" name="province_name">
                            </div>

                            <div class="form-group " hidden>
                                <label>City Name</label>
                                <input class="form-control" type="text" readonly id="city_name" name="city_name">
                            </div>

                            <div class="form-group " hidden>
                                <label>Service Name</label>
                                <input class="form-control" type="text" readonly id="service_name" name="service_name">
                            </div>

                        <div class="form-group summary-item payment-method">
                            <button class="btn btn-primary" type="submit">Checkout</button>

                            {{-- use this --}}
                            {{-- <a class="btn btn-primary" href="{{route('checkout')}}" wire:click.prevent="check_out()">Checkout</a> --}}
                        </div>

                    </div>
                    </div>

                    {{-- <div class="form-group">
                        <input type="text" class="form-control" id="hss_id" nama="hss_id" placeholder="ini untuk menangkap id ">
                    </div> --}}

                </form>
                {{-- cella --}}
            {{-- </div> --}}
        </div>

    </div><!--end container-->


</main>
<!--main area-->

</div>


