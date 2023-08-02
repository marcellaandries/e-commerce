<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        .rowRight{
            margin-right:20px !important;
        }

        /* https://mdbootstrap.com/docs/standard/extended/product-cards/ */
        @media (max-width: 767.98px) { .border-sm-start-none { border-left: none !important; } }

    </style>

      <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Addresses
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addproduct')}}" class="btn pull-right"><i class="fa fa-plus-square fa-2x text-info" title="new"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif

                        @foreach ($addresses as $address)
                            <section style="background-color: #eee;">
                                <div class="container py-5 mb-8">
                                {{-- <div class="row justify-content-center mb-3"> --}}
                                    {{-- <div class="col-md-12 col-xl-10"> --}}
                                    {{-- <div class="card shadow-0 border rounded-3"> --}}
                                        {{-- <div class="card-body"> --}}


                                            <div class="row">
                                                {{-- <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                                                    class="w-100" />
                                                    <a href="#!">
                                                    <div class="hover-overlay">
                                                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                    </div>
                                                    </a>
                                                </div>
                                                </div> --}}
                                                <div class="col-md-18 col-lg-9 col-xl-9 pl-25">
                                                        <h5>{{$address->firstname}}</h5>
                                                        <div class="d-flex flex-row">
                                                            <div class="text-primary mb-1 me-2">
                                                                {{$address->mobile}}
                                                            </div>
                                                            {{-- <span>310</span> --}}
                                                        </div>
                                                        <div class="mt-1 mb-0 text-muted small">
                                                            <span>{{$address->province}}</span>
                                                            <span class="text-primary"> • </span>
                                                            <span>{{$address->city}}</span>
                                                            <span class="text-primary"> • </span>
                                                            <span>{{$address->zipcode}}<br /></span>
                                                        </div>
                                                        {{-- <div class="mb-2 text-muted small">
                                                            <span>Unique design</span>
                                                            <span class="text-primary"> • </span>
                                                            <span>For men</span>
                                                            <span class="text-primary"> • </span>
                                                            <span>Casual<br /></span>
                                                        </div> --}}
                                                        <p class="text-truncate mb-4 mb-md-0">
                                                            {{$address->line1}}
                                                        </p>
                                                </div>
                                                <div class="col-md-6 col-lg-3 col-xl-3 pl-25 border-sm-start-none border-start">
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <h5 class="mb-1 me-1 text-primary">
                                                        @if($address->priority)
                                                            Main Address
                                                        @else

                                                        @endif
                                                        {{-- {{$address->priority}} --}}
                                                    </h5>
                                                    {{-- <span class="text-danger"><s>$20.99</s></span> --}}
                                                </div>
                                                <h6 class="text-success">{{$address->label}}</h6>
                                                <div class="d-flex flex-column mt-4">

                                                        {{-- <button class="btn btn-primary btn-sm" type="button">Select</button>
                                                        <button class="btn btn-primary btn-sm mt-2" type="button">
                                                        Edit
                                                        </button> --}}

                                                        <a href="#"><i class="fa fa-hand-o-up fa-2x text-info" title="choose"></i></a>
                                                        <a href="#"><i class="ml-8  fa fa-edit fa-2x text-info"title="edit"></i></a>
                                                        <a href="#" onclick="confirm('Are you sure, you want to delete this product?') || event.stopImmediatePropagation()" style="margin-left:10px;" wire:click.prevent="deleteAddress({{$address->id}})"><i class="fa fa-times fa-2x text-danger" title="delete"></i></a>
                                                </div>
                                                </div>
                                            </div>


                                        {{-- </div> --}}
                                    {{-- </div> --}}
                                    {{-- </div> --}}
                                {{-- </div> --}}
                                </div>
                            </section>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Addresses
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Zip Code</th>
                                    <th>Priority</th>
                                    <th>Label</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addresses as $address)
                                    <tr>

                                        <td>{{$address->firstname}}</td>
                                        <td>{{$address->mobile}}</td>
                                        <td>{{$address->line1}}</td>
                                        <td>{{$address->city}}</td>
                                        <td>{{$address->province}}</td>
                                        <td>{{$address->zipcode}}</td>
                                        <td>{{$address->priority}}</td>
                                        <td>{{$address->label}}</td>
                                        <td>
                                            <a href="#"><i class="fa fa-hand-o-up fa-2x text-info" title="choose"></i></a>
                                            <a href="#"><i class="fa fa-edit fa-2x text-info"title="edit"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, you want to delete this product?') || event.stopImmediatePropagation()" style="margin-left:10px;" wire:click.prevent="deleteAddress({{$address->id}})"><i class="fa fa-times fa-2x text-danger" title="delete"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-hand-o-up fa-2x text-info" title="choose"></i></a>
                                            <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x text-info"title="edit"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, you want to delete this product?') || event.stopImmediatePropagation()" style="margin-left:10px;" wire:click.prevent="deleteAddress({{$product->id}})"><i class="fa fa-times fa-2x text-danger" title="delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

</div>
