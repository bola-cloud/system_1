<div>
    <div class="container">
        <!-- search -->
        <div class="container mb-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="search-form">                          
                        <div class="search">
                            <!-- <i class="fa fa-search"></i> -->
                            <input type="search" class="form-control" placeholder="Have a question?" wire:model="search">
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
                            <div class="alert alert-success">{{Session::get('message')}}</div>
                        @endif
                        @if(Session::has('danger'))
                            <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <div wire:ignore class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">all categories </h4>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-description">
                                        <a href="{{route('create_coupon')}}" style="float:right ;" class="btn btn-outline-info"  >
                                            <i class="fa fa-plus"></i> Add new coupon
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>coupon code</th>
                                                    <th>coupon type</th>
                                                    <th>coupon value</th>
                                                    <th>cart value</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($coupons as $coupon)
                                                    <tr>
                                                        <td>{{$coupon->id}}</td>
                                                        <td>{{$coupon->code}}</td>
                                                        <td>{{$coupon->type}}</td>
                                                        @if($coupon->type =='fixed')
                                                            <td>{{$coupon->value}}</td>
                                                        @else
                                                        <td>{{$coupon->value}}%</td>
                                                        @endif
                                                        <td>{{$coupon->cart_value}}</td>
                                                        <td>
                                                            <a class="badge badge-info" href="{{route('edit_coupon',['coupon_id'=>$coupon->id])}}" >edit</a>
                                                            <a class="badge badge-danger" href="#" wire:click="delete({{$coupon->id}})" data-bs-toggle="modal" data-bs-target="#deleteCoupon{{$coupon->id}}">delete</a>
                                                        </td>
                                                    </tr>                                       
                                                    <!-- delete modal -->
                                                    <div class="modal right fade" id="deleteCoupon{{$coupon->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="card-title" id="exampleModalLabel">delete coupon </h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <form class="forms-sample" wire:submit.prevent="destroy" id="delete_coupon{{$coupon->id}}">                                                        
                                                                                <h5 class="card-description">
                                                                                    are you sure to delete coupon
                                                                                </h5>   
                                                                            </form>    
                                                                            <button type="submit" class="btn btn-primary me-2" form="delete_coupon{{$coupon->id}}">yes delete</button>
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
                                            {{$coupons->links()}}
                                        </div>
                                    </div>                             
                                </div>                              
                            </div>                    
                        </div>             
                    </div>
                </div>
                <!-- modals -->
                
            </div>
        </div>
    </div>
</div>
