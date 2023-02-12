<div class="container mb-5">
    <div class="row">
        @foreach($target_order as $order)
        <div class="col-md-5 grid-margin stretch-card mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Horizontal Form</h4>
                    <p class="card-description">
                    Horizontal form layout
                    </p>
                    <form class="forms-sample" wire:submit.prevent="updateOrder">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label padding">cust name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" placeholder="customer name" wire:model="cust_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">phone</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="exampleInputEmail2" placeholder="phone" wire:model="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">addres</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number" wire:model="addres">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">user name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputPassword2" placeholder="user name" wire:model="user_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">subtotal</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="exampleInputConfirmPassword2" placeholder="subtotal" wire:model="subtotal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">discound</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="exampleInputConfirmPassword2" placeholder="discound" wire:model="discound">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">delivery fee</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="exampleInputConfirmPassword2" placeholder="delivery" wire:model="delivery">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">total</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="exampleInputConfirmPassword2" placeholder="total" wire:model="total">
                            </div>
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7 grid-margin stretch-card mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hoverable Table</h4>
                    <p class="card-description">
                    Add class <code>.table-hover</code>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Product</th>
                                <th>price</th>
                                <th>quantity</th>
                                <th>Sale</th>
                                <th>time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderItem as $items)
                                @foreach($items->products as $key => $products)
                                    <tr>
                                        <td>{{$order->user->name}}</td>
                                        <td>{{$products->product_name}}</td>
                                        <td>{{$items->price}}</td>
                                        <td>{{$items->quantity}}</td>
                                        <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                                        <td>{{$order->created_at}}</td>
                                        @if($order->status =='ordered')
                                            <td><label class="badge badge-success">Ordered</label></td>
                                        @elseif($order->status =='delivered')
                                            <td><label class="badge badge-info">Delivered</label></td>
                                        @endif
                                        <td>
                                        
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach             
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-outline-info mt-4" href="{{route('admin_edit_order',['order_id'=>$order->id])}}">edit order</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
