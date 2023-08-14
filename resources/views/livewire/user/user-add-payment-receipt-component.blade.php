<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add Payment Receipt
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.orders')}}" class="btn btn-primary pull-right">All Orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addPaymentReceipt">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Bank Account Holder Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Bank Account Holder Name" class="form-control input-md" wire:model="sender_name" />
                                    @error('sender_name') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Transfer Date</label>
                                <div class="col-md-4">
                                    <input type="date" placeholder="Transfer Date" class="form-control input-md" wire:model="transfer_date" />
                                    @error('transfer_date') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Transfer Amount</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Transfer Amount" class="form-control input-md" wire:model="paid_amount" type-currency="IDR" />
                                    @error('paid_amount') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Transfer Receipt</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="payment_receipt" />
                                    @error('payment_receipt') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                    {{-- @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" />
                                    @endif --}}
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id') <span class="alert-danger" role="alert">{{ $message }}</span> @enderror
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
