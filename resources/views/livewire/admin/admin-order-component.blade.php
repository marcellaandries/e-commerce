<div>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        /* body{background-color: #eeeeee;font-family: 'Open Sans',serif} */
        /* .container{marg  in-top:50px;margin-bottom: 50px} */
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }

        .card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}
        .card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px;margin-left: 10px;
        width: 72vw; max-width:72vw;
        }

        .track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #00006c}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #00006c;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #00006c;border-color: #00006c;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #00006c;border-color: #00006c;border-radius: 1px}
    </style>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
    <div class="container">
        <article class="card">
            <header class="card-header"> Orders / Tracking </header>
            <div class="card-body ml-3">
                @foreach ($orders as $order)

                <article class="card">

                    <div class="card-body row ml-15">
                        <h5><strong>Order ID: </strong>{{$order->id}}</h5>
                        {{-- <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div> --}}
                        <div class="col mt-08 mb-08"> <strong>Status:</strong> <span class="label label-primary lb-sm">{{$order->status}}</span></div>
                        <div class="col mb-08"> <strong>Shipping by:</strong> {{$order->service}}
                            {{-- , | <i class="fa fa-phone"></i> +1598675986 </div> --}}
                        {{-- <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div> --}}
                        <a href="/admin/orders" class="btn btn-warning pull-right mr-3" data-abc="true"> <i class="fa fa-chevron-right"></i> Order Detail</a>
                    </div>

                    <div class="track">
                        <div class="step active" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Created</span> {{$order->created_at}}</div>
                        @if($order->paid_date)
                            <div class="step active" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Paid</span> {{$order->paid_date}}</div>
                        @else
                            <div class="step" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Paid</span> </div>
                        @endif

                        <div class="step" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Approved </span> </div>
                        <div class="step" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span> </div>
                    </div>

                </article>

                {{-- <hr> --}}
                {{-- <ul class="row">
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="https://i.imgur.com/iDwDQ4o.png" class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class="title">Dell Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$950 </span>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="https://i.imgur.com/tVBy5Q0.png" class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class="title">HP Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$850 </span>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="https://i.imgur.com/Bd56jKH.png" class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class="title">ACER Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$650 </span>
                            </figcaption>
                        </figure>
                    </li>
                </ul> --}}
                <hr>

                @endforeach
            </div>
            {{$orders->links()}}
        </article>
    </div>


</div>
