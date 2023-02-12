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
                    <div wire:ignore.self class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">all categories </h4>
                            </div>
                            <div class="col-md-4">
                                @livewire('admin.create-category-component')                            
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>category name</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $key => $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->category_name}}</td>
                                                <td>
                                                    <a class="badge badge-danger"  href="#" wire:click="delete({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteCategory{{$category->id}}">delete</a>
                                                    <a class="badge badge-info" href="#" wire:click="edit({{$category->id}})" data-bs-toggle="modal" data-bs-target="#updatCategory{{$category->id}}">Edit</a>
                                                </td>
                                            </tr>
                                           
                                            <!-- update modal -->
                                            <div class="modal right fade" id="updatCategory{{$category->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
                                                <div class="modal-dialog">
                                                    <form class="forms-sample" wire:submit.prevent="update" id="update_category{{$category->id}}">                                                        
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="card-title" id="exampleModalLabel">edit category </h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <!-- <p class="card-description">
                                                                            Basic form layout
                                                                        </p> -->
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Category name</label>
                                                                                <input type="text" class="form-control" value="{{$category->category_name}}" placeholder="Category name" wire:model.defer="name">
                                                                            </div>                                                                          
                                                                        <button type="submit" class="btn btn-primary me-2" form="update_category{{$category->id}}">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>  
                                            <!-- delete modal -->
                                            <div class="modal right fade" id="deleteCategory{{$category->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="card-title" id="exampleModalLabel">delete category </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <!-- <p class="card-description">
                                                                        Basic form layout
                                                                    </p> -->
                                                                    <form class="forms-sample" wire:submit.prevent="destroy" id="delete_category{{$category->id}}">                                                        
                                                                        <h5 class="card-description">
                                                                            are you sure to delete category
                                                                        </h5>   
                                                                    </form>    
                                                                    <button type="submit" class="btn btn-primary me-2" form="delete_category{{$category->id}}">yes delete</button>
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
                                        {{$categories->links()}}
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

