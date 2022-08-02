<div>
    
    <!-- search bar -->
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <div class="category-btn d-flex mt-3">
                        <div class="dropdown mr-2">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            category1
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                                @foreach($categories as $category)
                                <li><a class="dropdown-item active" href="#" wire:model="category" >{{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="dropdown mr-2">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                category2
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item active" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <div class="dropdown mr-2">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                category3
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton3">
                                <li><a class="dropdown-item active" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                                category4
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton4">
                                <li><a class="dropdown-item active" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>    

                </div>
                <div class="col-md-7">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-12">
                            <div class="search-form">
                                <form action="">
                                    <div class="search">
                                        <i class="fa fa-search"></i>
                                        <input type="text" class="form-control" placeholder="Have a question? Ask Now" name="query">
                                        <button class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{Session::get('success_message')}}
                </div>
            @endif
        </div>
    <!-- cart-->
    <div class="container-fluid mt-4">
        <div class="col-md-12">
            <div class="row"  >
                <div class="col-md-6">
                    <h2>كل المنتجات</h2>
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($products as $product)
                                <a href="#" wire:click.prevent="store( {{$product->id}},'{{$product->product_name}}'
                                ,{{$product->price}} )" >
                                    
                                    <div class=" diver box">
                                        <p class="product_details">
                                            {{$product->product_name}}<br>
                                            {{$product->description}}<br>
                                            {{$product->price}}                                            
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="wrap-pagination-info mb-4">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-3" > المنتجات المختارة</h4>
                    @if(cart::count()>0)
                    <table class="table table-borderless" id="table-back" >
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th>total price</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody class="pr-cart-item">
                            @foreach(cart::content() as $item)
                                <tr class="pr-cart-item">      
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <div class="price-field produtc-price">
                                            <p class="price">{{$item->price}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="quantity">
                                            <div class="quantity-input">
                                                <input type="number" data-id="{{$item->rowId}}" name="quantity_total"
                                                 value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >									
                                                <a class="btn btn-increase" href="#" id="up"  onclick="up('50')"
                                                 wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                                <a class="btn btn-reduce" href="#"  id="down" onclick=" down('1')"
                                                 wire:click.prevent="decreaseQuantity('{{$item->rowId}}')" ></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-field sub-total"><p class="price">${{$item->subtotal}}</p></div>
                                    </td>
                                    <td>
                                        <div class="delete">
                                            <a href="#" class="btn btn-delete" wire:click.prevent="destroy('{{$item->rowId}}')" title="">
                                                <span>Delete from your cart</span>
                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="total">
                        <p class="ml-2">Total price : <span class="ml-2"> {{cart::subtotal()}}</span></p>
                    </div>
                    <div class="update-clear">
						<a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
					</div>
                    <a class="btn btn-success" href="#" wire:click.prevent="checkout()">check out</a>
                    @else
                    <p>no item added</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


   