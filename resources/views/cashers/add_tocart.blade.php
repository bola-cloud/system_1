@extends('layouts.bars.navbar')

@section('navbar')

<!-- search bar -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-9">
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
                                            <a href="#" class="btn btn-outline-success">
                                                <i class="fa fa-plus-circle"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="ml-3">
                            {{ $products->links()}}
                        </div>
                    </div>      

                    

                </div>   <!-- end-col-md-9 -->

                <!--search-->

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>search product</h5>
                        </div>
                        <div class="card-body">
                            ....
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection    



