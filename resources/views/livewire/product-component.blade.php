<div wire:ignore.self>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row height d-flex ">
                    <div class="col-md-9">
                        <div class="search">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control w-100" placeholder="search for product" wire:model="search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card has-shadow">
                            <div class="card-header">
                                <h4  style="float:left">Add product</h4>
                                <a href="{{route('Add_product')}}" style="float:right ;" class="btn btn-outline-info">
                                    <i class="fa fa-plus"></i> Add new product
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name </th>
                                            <th>description</th>
                                            <th>price</th>
                                            <th>qu_inshop</th>
                                            <th>qty_total</th>
                                            <th>brand</th>
                                            <th>category</th>
                                            <th>time</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $key => $product)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{$product->description}}</td>
                                                <td>{{ number_format($product->price ,2)}}</td>
                                                <td>{{$product->quantity_inshop}}</td>
                                                <td>
                                                    @if($product->quantity_total <= 15)
                                                        <span class="badge badge-danger text-danger">{{$product->quantity_total}}</span>
                                                    @else  
                                                        <span class="badge badge-success text-primary">{{$product->quantity_total}}</span>
                                                    @endif
                                                </td>
                                                <td>{{$product->brand}}</td>
                                                <td>{{$product->category->category_name}}</td>
                                                <td>{{$product->created_at}}</td>
                                                <td>
                                                    <a href="{{route('edit_prod',$product->id)}}" class="btn btn-primary mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    
                                                    <a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#deleteProduct{{$product->id}}" wire:click="delete({{$product->id}})">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                            <!-- Modals --> 
                                            
                                            <!-- modal to edit product -->
                                            <!-- <div class="modal right fade" id="editProduct{{$product->id}}" data-backdrop="static" data-keyboard="false"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        {{$product->id}}
                                                    </div>
                                                    <div class="modal-body">
                                                        <form  wire:submit.prevent="update" id="update_product{{$product->id}}" enctype='multipart/form-data'>
                                                            <div class="form-group">
                                                                <label for="">Name</label>
                                                                <input type="text" name="product_name" wire:model.defer="product_name" value="{{$product->product_name}}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">description</label>
                                                                <textarea type="description" name="description" wire:model.defer="description"  cols="30" rows="2" class="form-control">{{$product->description}}</textarea>
                                                            </div>
                                                            <div class="form-group d-inline-block mr-5">
                                                                <label for="">price</label>
                                                                <input type="number" name="price" wire:model.defer="price" value="{{$product->price}}" class="form-control">
                                                            </div>
                                                            <div class="form-group d-inline-block">
                                                                <label for="">Cost</label>
                                                                <input type="number" name="cost" wire:model.defer="cost" value="{{$product->cost}}" class="form-control">
                                                            </div>
                                                            <div class="form-group d-inline-block mr-5">
                                                                <label for="">sale</label>
                                                                <input type="number" name="sale" wire:model.defer="sale" value="{{$product->sale}}" class="form-control">
                                                            </div>
                                                            <div class="form-group d-inline-block ">
                                                                <label for="">sale_price</label>
                                                                <input type="number" name="sale_price" wire:model.defer="sale_price" value="{{$product->sale_price}}" class="form-control">
                                                            </div>
                                                            <div class="form-group d-inline-block mr-5">
                                                                <label for="">Quantity_inshop</label>
                                                                <input type="number" name="quantity_inshop" wire:model.defer="quantity_inshop" value="{{$product->quantity_inshop}}" class="form-control">
                                                            </div>
                                                            <div class="form-group d-inline-block">
                                                                <label for="">quantity_total</label>
                                                                <input type="number" name="quantity_total" wire:model.defer="quantity_total" value="{{$product->quantity_total}}" class="form-control">
                                                            </div>
                                                            <div class="form-group d-inline-block mr-4">
                                                                <label for=""> Brand</label>
                                                                <input type="text" name="brand" wire:model.defer="brand" value="{{$product->brand}}" class="form-control">
                                                            </div>
                                                            <div class="form-group d-inline-block">
                                                                <label for=""> code</label>
                                                                <input type="number" name="product_code" wire:model.defer="product_code" class="form-control">
                                                            </div>
                                                            <div class="form-group d-inline-block mr-4">
                                                                <label for=""> category</label>
                                                                <select class="form-select" wire:model="category_id">
                                                                    <option >select</option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->category_name}}</option>    
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-warning" form="update_product{{$product->id}}" >Save changes</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <!-- modal to delete product -->
                                            <div class="modal right fade" id="deleteProduct{{$product->id}}" data-backdrop="static" data-keyboard="false"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="col-md-11">
                                                                <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                                                            </div>                            
                                                            <div class="col-md-1">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                {{$product->id}}
                                                            </div>      
                                                        </div>
                                                        <div class="modal-body">
                                                            <form wire:submit.prevent="destroy" id="delete_product">
                                                                <p>Are you sure you want to delete {{$product->product_name}}</p>                                                       
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-default" data-dismiss="modal" > Cancel</button>
                                                            <button class="btn btn-danger" type="submit" form="delete_product" > Delete</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="ms-3 mb-4">
                                {{ $products->withQueryString()->links() }}
                            </div>
                        </div>

                                        

                        <!-- modal to add product -->
                        
                    </div>   
                    <!-- end-col-md-9 -->

                    <!--category-->

                    <div class="col-md-3" wire:ignore.self>
                        <div class="card has-shadow">
                            <div class="card-header">
                                <h5> product category</h5>
                            </div>
                            <div class="card-body">
                                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class=" list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-start align-items-center">
                                        <span class="fa fa-user fa-fw mr-3"></span>
                                        <span class="menu-collapsed">category</span>
                                        <span class="submenu-icon ml-auto"></span>
                                    </div>
                                </a>
                                <!-- Submenu content -->
                                <div id='submenu2' class="collapse sidebar-submenu">
                                    @foreach($categories as $category)
                                        <a href="#" class="list-group-item list-group-item-action text-gray">
                                            <span class="menu-collapsed"> {{$category->category_name}}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
