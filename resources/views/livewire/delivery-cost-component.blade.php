<div>
    <!--main area-->
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Shipping</span></li>
            </ul>
        </div>

        <div class=" main-content-area">
            {{-- <div class="wrap-address-billing"> --}}
                <h3 class="box-title" style="font-size: 14px;"><b>SHIPPING METHOD</b></h3>

                {{-- cella --}}
                {{-- <form class="ps-checkout__form" action="" method="post"> --}}
                <form class="ps-checkout__form" action="{{ route('check.out') }}" method="post"
                enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-8">

                    {{-- cella hide --}}
                    <div class="form-group " hidden>
                    <label>Provinsi asal</label>
                    <input type="text" value="6" class="form-control" name="province_origin">
                    </div>
                    <div class="form-group " hidden>
                    <label>Kota Asal</label>
                    <input type="text" value="152" class="form-control" id="city_origin" name="city_origin">
                    </div>


                    {{-- <div class="form-group ">
                    <label>Address<span>*</span>
                    </label>
                    <textarea name="address" class="form-control" rows="5" placeholder="Shipping full address" ></textarea>
                    </div> --}}

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

                        <div class="form-group ">
                            <label>Choose Expedition<span>*</span>
                            </label>
                            <select name="kurir" id="kurir" class="form-control">
                            <option value="">Choose Courier</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS INDONESIA</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label>Choose Service<span>*</span>
                            </label>
                            <select name="layanan" id="layanan" class="form-control">
                            <option value="">Choose Service</option>
                            </select>
                        </div>

                            {{-- <label>Postcode / ZIP<span>*</span>
                            </label>
                            <input type="text" name="kode_pos" class="form-control" > --}}
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group ">
                    <label>Cart Total<span>*</span>
                    </label>
                    <input type="text" readonly id="totalbelanja" name="totalbelanja" value="Rp {{Cart::subtotal()}}" class="form-control" >
                    </div>
                    <div class="form-group hidden">
                    <label>Weight Total (gram) </label>
                    <input readonly class="form-control" type="text" value="{{number_format($weight_total, 0, "", ".")}}" id="weight" name="weight">
                    </div>
                    <div class="form-group ">
                        <label>Weight Total (kg) </label>
                        <input readonly class="form-control" type="text" value="{{number_format($weight_total/1000, 0, "", ".")}}" id="weight_kg" name="weight_kg">
                    </div>
                    <div class="form-group ">
                    <label>Shipping Cost Total</label>
                    <input class="form-control" type="text" readonly id="ongkos_kirim" name="ongkos_kirim">
                    </div>
                    <div class="form-group ">
                    <label>Grandtotal</label>
                    <input class="form-control" type="text" readonly id="total_keseluruhan" name="total_keseluruhan">
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


