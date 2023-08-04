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
                    <form action="{{ route('add.address') }}" method="post"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Address</h3>
                                {{-- <form action="#" method="get" name="frm-billing"> --}}
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">first name<span>*</span></label>
                                        <input type="text" id ="firstname" name="firstname" value="" placeholder="Your name">
                                        @error('firstname') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                    {{-- <p class="row-in-form">
                                        <label for="lname">last name<span>*</span></label>
                                        <input type="text" name="lastname" value="" placeholder="Your last name" wire:model="lastname">
                                        @error('lastname') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p> --}}
                                    <p class="row-in-form">
                                        <label for="email">Email Address:</label>
                                        <input type="email" name="email" value="" placeholder="Type your email">
                                        @error('email') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Phone number<span>*</span></label>
                                        <input type="number" name="mobile" value="" placeholder="number format">
                                        @error('mobile') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Address (line 1):<span>*</span></label>
                                        <input type="text" name="line1" value="" placeholder="Street at apartment number">
                                        @error('line1') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>
                                    {{-- <p class="row-in-form">
                                        <label for="add">Address (line 2):</label>
                                        <input type="text" name="line2" value="" placeholder="Street at apartment number" wire:model="line2">
                                    </p> --}}

                                    <p class="row-in-form">
                                        <label for="country">Country</label>
                                        <input type="text" readonly name="country" value="Indonesia" placeholder="Country">
                                    </p>

                                    <p class="row-in-form">
                                        <label for="province_id">Province<span>*</span></label>
                                        <select name="province_id" id="province_id" class="form-control">
                                        <option value="">Select Province</option>
                                        @foreach ($provinsi as $row)
                                        <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                                        @endforeach
                                        </select>
                                        @error('province_id') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>



                                    <p class="row-in-form">
                                        <label for="kota_id">Town / City<span>*</span>
                                        </label>
                                        <select name="kota_id" id="kota_id" class="form-control">
                                        <option value="">Choose City</option>
                                        </select>
                                        @error('kota_id') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>

                                    <p class="row-in-form">
                                        <label for="zip-code">Postcode / ZIP:<span>*</span></label>
                                        <input type="number" name="zipcode" value="" placeholder="Your postal code">
                                        @error('zipcode') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    </p>

                                    <p class="row-in-form">
                                        <input type="hidden" readonly class="form-control" id="nama_provinsi" nama="nama_provinsi" placeholder="province name ">
                                    </p>
                                    <p class="row-in-form">
                                        <input type="hidden" readonly class="form-control" id="nama_kota" nama="nama_kota" placeholder="city name">
                                    </p>



                                    {{-- cella --}}
                                    <p class="row-in-form hidden">
                                        <label>Province Name</label>
                                        <input class="form-control" type="text" readonly id="province_name" name="province_name">
                                    </p>

                                    <p class="row-in-form hidden">
                                        <label>City Name</label>
                                        <input class="form-control" type="text" readonly id="city_name" name="city_name">
                                    </p>
                                </div>



                                {{-- </form> --}}
                            </div>

                            {{-- <div class="col-md-6">


                                <div class="form-group form-group--inline">
                                    <label for="provinsi">Province<span>*</span></label>
                                    <select name="province_id" id="province_id" class="form-control">
                                    <option value="">Select Province</option>
                                    @foreach ($provinsi as $row)
                                    <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" readonly class="form-control" id="nama_provinsi" nama="nama_provinsi" placeholder="province name ">
                                </div>


                                <div class="form-group ">
                                <label>Town / City<span>*</span>
                                </label>
                                <select name="kota_id" id="kota_id" class="form-control">
                                <option value="">Choose City</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <input type="text" readonly class="form-control" id="nama_kota" nama="nama_kota" placeholder="city name">
                                </div>

                                <div class="form-group ">
                                    <label>Province Name</label>
                                    <input class="form-control" type="text" readonly id="province_name" name="province_name">
                                </div>

                                <div class="form-group ">
                                    <label>City Name</label>
                                    <input class="form-control" type="text" readonly id="city_name" name="city_name">
                                </div>

                            </div> --}}





                        <div class="summary-item payment-method mt-12 mb-5">
                        {{-- <button type="submit" class="btn btn-medium" wire:click.prevent="placeOrder()">Place order now</button> --}}
                            <button type="submit" class="btn btn-medium">Add</button>
                        </div>

                    </div>

                </form>

            </div><!--end main content area-->
        </div><!--end container-->

    </main>
    <!--main area-->

    </div>
