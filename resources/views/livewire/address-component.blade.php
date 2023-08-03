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

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
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
                                <a href="{{route('addaddress')}}" class="btn pull-right"><i class="fa fa-plus-square fa-2x text-info" title="new"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif

                        @foreach ($addresses as $address)
                            <section style="background-color: #eee;">
                                <div class="container py-5 mb-1">

                                    <div class="row">
                                        <div class="pl-35 col-md-1 col-lg-1 col-xl-1 mb-1 mb-lg-1 mt-2">
                                            <span class="mb-1 me-1 text-primary">
                                                @if($address->priority)
                                                    <input type="radio" id="isPriority" name="isPriority" value="1" checked=checked>

                                                @else
                                                    <input class="form-check-input" type="radio" id="isPriority" name="isPriority" value="0">

                                                @endif
                                            </span>

                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2 pl-25 mt-06">
                                            <h5>{{$address->firstname}}</h5>
                                            <p class="text-primary text-truncate mb-4 mb-md-0">
                                                {{$address->mobile}}
                                            </p>
                                        </div>
                                        <div class="col-md-5 col-lg-5 col-xl-5 pl-25 mt-12">
                                            <div class="d-flex flex-row">
                                                <div class="text-primary mb-1 me-2">
                                                    {{$address->line1}}
                                                </div>
                                            </div>
                                            <div class="mt-12 mb-0 text-muted small">
                                                <span>{{$address->province}}</span>
                                                <span class="text-primary"> • </span>
                                                <span>{{$address->city}}</span>
                                                <span class="text-primary"> • </span>
                                                <span>{{$address->zipcode}}<br /></span>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-lg-2 col-xl-2 border-sm-start-none border-start mt-06 pl-35">
                                            <div class="d-flex flex-row align-items-center mb-1">
                                                <h6 class="mb-1 me-1 text-primary">
                                                    @if($address->priority)
                                                        <span class="label label-primary">Primary</span>
                                                    @else
                                                        <span class="label label-default">Not Primary</span>
                                                    @endif
                                                </h6>
                                            </div>
                                            <h6 class="label label-info mb-1">{{$address->label}}</h6>
                                        </div>

                                        <div class="col-md-2 col-lg-2 col-xl-2 border-sm-start-none border-start mt-2">
                                            <div class="d-flex flex-column mt-06">
                                                <a href="#"><i class="fa fa-edit fa-2x text-info ml-12" title="edit"></i>&nbsp;Edit</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </section>
                            <hr>
                        @endforeach

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
                            {{-- <a href="{{route('admin.addproduct')}}" class="btn btn-primary pull-right mr-2 mb-2">Confirm</a> --}}
                            <a class="btn btn-primary pull-right mr-2 mb-2" href="#" wire:click.prevent="ship()">Confirm</a>
                        </div>
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
