@extends('layouts.bars.navbar')

@section('navbar')

<!-- search bar -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-9">
                    <form action="{{ route('products.index')}}"  method="GET">
                        <div class="search">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control" placeholder="Have a question? Ask Now" name="search">
                            <button class="btn btn-primary" type="submit" >Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4  style="float:left">Add product</h4>
                            <a href="#" style="float:right ;" class="btn btn-outline-info" data-toggle="modal" data-target="#addProduct" >
                                <i class="fa fa-plus"></i> Add new product
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name </th>
                                        <th>description</th>
                                        <th>price</th>
                                        <th>qu_inshop</th>
                                        <th>qu_instore</th>
                                        <th>brand</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{ number_format($product->price ,2)}}</td>
                                        <td>{{$product->quantity_inshop}}</td>
                                        <td>
                                            @if($product->quantity_total <= 15)
                                                <span class="badge badge-danger">{{$product->quantity_total}}</span>
                                            @else  
                                                <span class="badge badge-success">{{$product->quantity_total}}</span>
                                            @endif
                                        </td>
                                        <td>{{$product->brand}}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#editProduct{{$product->id}}" class="btn btn-primary mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#deleteProduct{{$product->id}}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                     <!-- Modals --> 
                                     <!-- modal to edit product -->
                                    <div class="modal right fade" id="editProduct{{$product->id}}" data-backdrop="static" data-keyboard="false"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                            <form action="{{route('products.update', $product->id)}}"  method="POST" id="update_product{{$product->id}}" enctype='multipart/form-data'>
                                                @csrf
                                                @method('put')

                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">description</label>
                                                    <textarea type="description" name="description"  cols="30" rows="2" class="form-control">{{$product->description}}</textarea>
                                                </div>
                                                <div class="form-group d-inline-block mr-5">
                                                    <label for="">price</label>
                                                    <input type="number" name="price" value="{{$product->price}}" class="form-control">
                                                </div>
                                                <div class="form-group d-inline-block">
                                                    <label for="">Cost</label>
                                                    <input type="number" name="cost" value="{{$product->cost}}" class="form-control">
                                                </div>
                                                <div class="form-group d-inline-block mr-5">
                                                    <label for="">sale</label>
                                                    <input type="number" name="sale" value="{{$product->sale}}" class="form-control">
                                                </div>
                                                <div class="form-group d-inline-block ">
                                                    <label for="">sale_price</label>
                                                    <input type="number" name="sale_price" value="{{$product->sale_price}}" class="form-control">
                                                </div>
                                                <div class="form-group d-inline-block mr-5">
                                                    <label for="">Quantity_inshop</label>
                                                    <input type="number" name="quantity_inshop" value="{{$product->quantity_inshop}}" class="form-control">
                                                </div>
                                                <div class="form-group d-inline-block">
                                                    <label for="">quantity_total</label>
                                                    <input type="number" name="quantity_total" value="{{$product->quantity_total}}" class="form-control">
                                                </div>
                                                <div class="form-group d-inline-block mr-4">
                                                    <label for=""> Brand</label>
                                                    <input type="text" name="brand" value="{{$product->brand}}" class="form-control">
                                                </div>
                                            </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-warning" form="update_product{{$product->id}}" >Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal to delete product -->
                                    <div class="modal right fade" id="deleteProduct{{$product->id}}" data-backdrop="static" data-keyboard="false"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                <form action="{{ route('products.destroy', $product->id) }}"  method="POST" id="delete_product">
                                                    @csrf 
                                                    @method('delete')
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
                        <div class="ml-3 mb-4">
                            {{ $products->links()}}
                        </div>
                    </div>

                                    

                    <!-- modal to add product -->
                    <div class="modal right fade" id="addProduct" data-backdrop="static" data-keyboard="false"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('products.store') }}"  method="POST" id="add-form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="product_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">description</label>
                                        <textarea type="description" name="description" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group d-inline-block mr-5">
                                        <label for="">price</label>
                                        <input type="number" name="price" class="form-control">
                                    </div>
                                    <div class="form-group d-inline-block">
                                        <label for="">Cost</label>
                                        <input type="number" name="cost" class="form-control">
                                    </div>
                                    <div class="form-group d-inline-block mr-5">
                                        <label for="">sale</label>
                                        <input type="number" name="sale" class="form-control">
                                    </div>
                                    <div class="form-group d-inline-block ">
                                        <label for="">sale_price</label>
                                        <input type="number" name="sale_price" class="form-control">
                                    </div>
                                    <div class="form-group d-inline-block mr-5">
                                        <label for="">Quantity_inshop</label>
                                        <input type="number" name="quantity_inshop" class="form-control">
                                    </div>
                                    <div class="form-group d-inline-block">
                                        <label for="">quantity_total</label>
                                        <input type="number" name="quantity_total" class="form-control">
                                    </div>
                                    <div class="form-group d-inline-block mr-5">
                                        <label for=""> Brand</label>
                                        <input type="text" name="brand" class="form-control">
                                    </div>
                                    <div class="form-group d-inline-block">
                                        <label for=""> code</label>
                                        <input type="number" name="product_code" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" form="add-form" >Save product</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    

                </div>   <!-- end-col-md-9 -->

                <!--category-->

                <div class="col-md-3">
                    <div class="card">
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
                                <a href="#" class="list-group-item list-group-item-action text-gray">
                                    <span class="menu-collapsed">الصف الرابع </span>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action text-gray">
                                    <span class="menu-collapsed">ادوات</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script >
   

  
</script>


@endsection