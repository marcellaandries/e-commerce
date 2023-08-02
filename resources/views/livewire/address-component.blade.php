<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
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
                                    {{-- <th>Id</th> --}}
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
                                        {{-- <td>{{$address->id}}</td> --}}
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
                                        {{-- <td>
                                            <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-hand-o-up fa-2x text-info" title="choose"></i></a>
                                            <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x text-info"title="edit"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, you want to delete this product?') || event.stopImmediatePropagation()" style="margin-left:10px;" wire:click.prevent="deleteAddress({{$product->id}})"><i class="fa fa-times fa-2x text-danger" title="delete"></i></a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
