<div class="container">
    <!-- search -->
    <div class="container mb-3">
        <div class="search-form">
            <div class="row">
                <div class="col-md-6">                          
                    <h2>search bar</h2>                       
                    <div class="search">
                        <!-- <i class="fa fa-search"></i> -->
                        <input type="search" class="form-control" placeholder="Have a question?" wire:model="search">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">                  
                            <h2> date from </h2>
                            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                                <span class="input-group-addon input-group-prepend border-right">
                                    <span class="icon-calendar input-group-text calendar-icon"></span>
                                </span>
                                <input type="date" class="form-control" wire:model="startDate">
                            </div>
                        </div>
                        <div class="col-md-6">                      
                            <h2>  to </h2>
                            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                                <span class="input-group-addon input-group-prepend border-right">
                                    <span class="icon-calendar input-group-text calendar-icon"></span>
                                </span>
                                <input type="date" class="form-control" wire:model="endDate">
                            </div> 
                        </div>  
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">                   
                <div class="card">
                    @if(Session::has('message'))
                        <div class="alert alert-danger">{{Session::get('message')}}</div>
                    @endif
                    <div wire:ignore.self class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">all orders </h4>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('product.shop')}}" style="float:right ;" class="btn btn-outline-info" >
                                    Add new order
                                </a>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th> cust_name</th>
                                            <th>phone</th>
                                            <th>total</th>
                                            <th>discound</th>
                                            <th>status</th>
                                            <th>address</th>
                                            <th>shpping</th>
                                            <th>shpping fee</th>
                                            <th>time</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $key => $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->cust_name}}</td>
                                                <td>{{$order->phone}}</td>
                                                <td>{{$order->total}}</td>
                                                <td>{{$order->discound}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>{{$order->address}}</td>
                                                @if($order->is_shipping == 1)
                                                    <td>yes</td>
                                                @elseif($order->is_shipping == 0)
                                                    <td>no</td>
                                                @endif
                                                <td>{{$order->delivery}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    <a class="badge badge-warning" href="{{route('admin_orderdetails',['id'=>$order->id])}}" wire:click="">order details</a>
                                                    <a class="badge badge-danger"  href="#" wire:click.prevent="delete({{$order->id}})" data-bs-toggle="modal" data-bs-target="#deleteOrder{{$order->id}}">delete</a>
                                                </td>
                                            </tr>
                                            <!-- delete modal -->
                                            <div wire:ignore.self class="modal right fade" id="deleteOrder{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="card-title" id="exampleModalLabel">delete user </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">                               
                                                                    <form class="forms-sample" wire:submit.prevent="destroy" id="delete_order{{$order->id}}">                                                        
                                                                        <h5 class="card-description">
                                                                            are you sure to delete user
                                                                        </h5>   
                                                                    </form>    
                                                                    <button type="submit" class="btn btn-primary me-2" form="delete_order{{$order->id}}">yes delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="wrap-pagination-info mb-4">
                                    {{$orders->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(function() {
           $('#datepicker-popup').datetimepicker();
        });
</script>  