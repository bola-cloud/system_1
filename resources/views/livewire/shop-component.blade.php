<div wire:ignore.self>
    
    <!-- search bar -->
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="category-btn d-flex mt-3" >
                        <div class="ms-2 me-2" style="width:150px;">
                            <select  class="form-select" aria-label="Default select example" wire:model="category_id">
                                <option value=""selected>category</option>
                                @foreach($categories as $category)
                                    <option class="selectpicker show-tick"  value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>       
                    </div>    

                </div>
                <div class="col-md-6">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-12">
                            <div class="search-form">
                                <form action="">
                                    <div class="search">
                                        <i class="fa fa-search"></i>
                                        <input type="text" class="form-control w-100" placeholder="Have a question? Ask Now" name="" wire:model="search">
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
            @if(Session::has('warning'))
                <div class="alert alert-warning">
                    {{Session::get('warning')}}
                </div>
            @endif
        </div>
    <!-- cart items-->
    <div class="container-fluid mt-4">
        <div class="col-md-12">
            <div class="row"  >
                <div class="col-md-6 ">
                    <div class="has-shadow all_products">
                        <div style="display:flex; justify-content: center ;border-bottom: 1px solid #e6e6e6;">
                            <P><i class="mt-3 fas fa-shopping-cart fa-lg"></i></P>
                            <h2 class="mt-2 me-3">Add products to cart</h2>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="row mt-1 pb-4 pl-4 pt-1">
                                @foreach($products as $product)
                                    <a href="#" class="w-auto p-3" wire:click.prevent="store({{$product->id}},'{{$product->product_name}}',
                                       {{$product->price}},{{$product->quantity_total}})">
                                        <div class="diver box">
                                            <p class="product_details">
                                                {{$product->product_name}}<br>
                                                {{$product->description}}<br>
                                                {{$product->price}} LE <br> 
                                                qu:{{$product->quantity_total}}                                                                                      
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 chosen_products">
                    <div class="has-shadow all_products ps-2 pb-4 pe-2 pt-1">
                        <div style="display:flex; justify-content: center ;border-bottom: 1px solid #e6e6e6;">
                            <P><i class="mt-3 fas fa-cart-arrow-down fa-lg"></i></P>
                            <h2 class="mt-1 me-3">Chosen products</h2>
                        </div>
                        @if(Cart::instance('cart')->count() > 0)
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
                                    @foreach(Cart::instance('cart')->content() as $item)
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
                                                        value="{{$item->qty}}" data-max="120" pattern="[0-9]*">									
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
                                <p class="ms-2">Total price : <span class="ms-2"> {{Cart::subtotal()}}</span></p>
                            </div>
                            <div class="update-clear">
                                <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                            </div>
                            <a class="btn btn-success" href="#" wire:click.prevent="checkout()">check out</a>
                        @else
                            <p class="d-flex justify-content-center mt-2">no item added</p>
                        @endif
                    </div>
                </div>
                <div class="wrap-pagination-info mb-4">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


   