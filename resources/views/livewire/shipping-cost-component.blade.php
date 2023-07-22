<!--main area-->
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>

        <div class=" main-content-area">
            {{-- <div class="wrap-address-billing"> --}}
                <h3 class="box-title" style="font-size: 14px;"><b>SHIPPING ADDRESS</b></h3>

                {{-- cella --}}
                <form class="ps-checkout__form" action="" method="post">
                    @csrf
                    <div class="row">
                    <div class="col-md-8">


                    <div class="form-group ">
                    <label>Alamat<span>*</span>
                    </label>
                    <textarea name="address" class="form-control" rows="5" placeholder="Alamat Lengkap pengiriman" ></textarea>
                    </div>

                    {{-- cella --}}
                    <div class="form-group form-group--inline">
                        <label for="provinsi">Provinsi Tujuan</label>
                        <select name="province_id" id="province_id" class="form-control">
                        <option value="">Select Province</option>
                        @foreach ($provinsi as $row)
                        <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                        @endforeach
                        </select>
                    </div>
                    {{-- cella --}}


                    <div class="form-group ">
                    <label>Kota Tujuan<span>*</span>
                    </label>
                    <select name="kota_id" id="kota_id" class="form-control">
                    <option value="">Pilih Kota</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" nama="nama_kota" placeholder="ini untuk menangkap nama kota">
                    </div>
                    <div class="form-group ">
                    <label>Kode Pos<span>*</span>
                    </label>
                    <input type="text" name="kode_pos" class="form-control" >
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group ">
                    <label>Total Belanja<span>*</span>
                    </label>
                    <input type="text" name="totalbelanja" class="form-control" >
                    </div>
                    <div class="form-group ">
                    <label>Total Berat (gram) </label>
                    <input class="form-control" type="text" value="" id="weight" name="weight">
                    </div>
                    <div class="form-group ">
                    <label>Total Ongkos Kirim </label>
                    <input class="form-control" type="text" id="ongkos_kirim" name="ongkos_kirim">
                    </div>
                    <div class="form-group ">
                    <label>Total Keseluruhan </label>
                    <input class="form-control" type="text" id="ongkos_kirim" name="ongkos_kirim">
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary" type="submit">Proses Order</button>
                    </div>

                    </div>
                    </div>

                </form>
                {{-- cella --}}
            {{-- </div> --}}
        </div>

    </div><!--end container-->

</main>
<!--main area-->
