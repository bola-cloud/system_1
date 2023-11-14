<div>
    <div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="mt-4">Add New Product</h2>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store" id="add-form">
                        <div class="row">
                            <div class="col-md-6 form-group d-inline-block">
                                <label for="">Product Name</label>
                                <input type="text" name="product_name"  wire:model.defer="product_name" class="form-control w-75">
                                @error('product_name') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-md-6 form-group d-inline-block">
                                <label for="">description</label>
                                <input type="description" name="description"  wire:model.defer="description" cols="30" rows="2" class="form-control w-75"></textarea>
                                @error('description') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group d-inline-block mr-5 w-25">
                                <label for="">price</label>
                                <input type="number" name="price"  wire:model.defer="price" class="form-control ">
                                @error('price') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group d-inline-block w-25">
                                <label for="">Cost</label>
                                <input type="number" name="cost"  wire:model.defer="cost" class="form-control">
                                @error('cost') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group d-inline-block mr-5 w-25">
                                <label for="">sale</label>
                                <input type="number" name="sale"  wire:model.defer="sale" class="form-control">
                                @error('sale') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group d-inline-block w-25">
                                <label for="">sale_price</label>
                                <input type="number" name="sale_price"  wire:model.defer="sale_price" class="form-control">
                                @error('sale_price') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group d-inline-block mr-5 w-25">
                                <label for="">Quantity_inshop</label>
                                <input type="number" name="quantity_inshop"  wire:model.defer="quantity_inshop" class="form-control">
                                @error('quantity_inshop') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group d-inline-block w-25">
                                <label for="">quantity_total</label>
                                <input type="number" name="quantity_total"  wire:model.defer="quantity_total" class="form-control">
                                @error('quantity_total') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group d-inline-block mr-5 w-25">
                                <label for=""> Brand</label>
                                <input type="text" name="brand"  wire:model.defer="brand" class="form-control">
                                @error('brand') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group d-inline-block w-25">
                                <label for=""> code</label>
                                <input type="number" name="product_code" wire:model.defer="product_code" class="form-control">
                                @error('product_code') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group d-inline-block mr-5 w-25">
                                <select class="form-select w-50" wire:model="category_id">
                                    <option>category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>        
                        
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" form="add-form" >Save product</button>
                </div>
            </div>
        </div>
    </div>
</div>
