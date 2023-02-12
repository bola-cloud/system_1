<div class="container">
    <!-- search -->
    <div class="container mb-3">
        <div class="col-md-6">
            <div class="row">
                <div class="search-form">                          
                    <div class="search">
                        <!-- <i class="fa fa-search"></i> -->
                        <input type="search" class="form-control" placeholder="Search for user?" wire:model="search"/>
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
                    <div wire:ignore class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">all Users </h4>
                            </div>
                            <div class="col-md-4">
                                <p class="card-description">
                                    <a href="#" style="float:right ;" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#addUser" >
                                        <i class="fa fa-plus"></i> Add new user
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
                                                <th>user name</th>
                                                <th>phone</th>
                                                <th>category</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $key => $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->category}}</td>
                                                <td>
                                                    <a class="badge badge-danger"  href="#" wire:click="delete({{$user->id}})" data-bs-toggle="modal" data-bs-target="#deleteUser{{$user->id}}">delete</a>
                                                    <a class="badge badge-info" href="#" wire:click="edit({{$user->id}})" data-bs-toggle="modal" data-bs-target="#updatUser{{$user->id}}">Edit</a>
                                                </td>
                                            </tr>
                                            <!-- store -->
                                            <div wire:ignore.self class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="card-title" id="exampleModalLabel">Add user </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <p class="card-description">
                                                                        Basic form layout
                                                                    </p>
                                                                    <form class="forms-sample" wire:submit.prevent="store">           
                                                                        <div class="form-group">
                                                                            <label for="exampleInputUsername1">user name</label>
                                                                            <input type="text" class="form-control" placeholder="user name" wire:model="name">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputUsername1"> phone</label>
                                                                            <input type="text" class="form-control" placeholder="user phone" wire:model="phone">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputUsername1">user category</label>
                                                                            <select class="form-control form-control-sm" id="exampleFormControlSelect3" wire:model="category">
                                                                                <option value="user" selected>User</option>
                                                                                <option value="admin">Admin</option>
                                                                            </select>
                                                                        </div> 
                                                                        <div class="form-group">
                                                                            <label for="exampleInputUsername1">password</label>
                                                                            <input type="password" class="form-control"  placeholder="enter password" wire:model="password">
                                                                        </div> 
                                                                        <div class="form-group">
                                                                            <label for="exampleInputUsername1">confirm password</label>
                                                                            <input type="password" class="form-control" name="paassword_confirmation" placeholder="enter password" wire:model="">
                                                                        </div> 
                                                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            <!-- edit modal -->
                                            <div wire:ignore.self class="modal right fade" id="updatUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="card-title" id="exampleModalLabel">edit user </h4>
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
                                                                    <form class="forms-sample" wire:submit.prevent="update" id="update_user{{$user->id}}">                                                        
                                                                        <div class="form-group">
                                                                            <label for="exampleInputUsername1">user name</label>
                                                                            <input type="text" class="form-control" value="{{$user->name}}" placeholder="Category name" wire:model="name">
                                                                        </div>        
                                                                        <div class="form-group">
                                                                            <label for="exampleInputUsername1">phone</label>
                                                                            <input type="text" class="form-control" value="{{$user->phone}}" placeholder="Category name" wire:model="phone">
                                                                        </div> 
                                                                        <div class="form-group">
                                                                            <label for="exampleInputUsername1">user category</label>
                                                                            <select class="form-control form-control-sm" id="exampleFormControlSelect3" wire:model="category">
                                                                                <option selected>user</option>
                                                                                <option>admin</option>
                                                                                <option>manager</option>      
                                                                            </select>
                                                                        </div> 
                                                                        <div class="form-group">
                                                                            <label for="exampleInputUsername1">password</label>
                                                                            <input type="password" class="form-control" value="{{$user->password}}" placeholder="enter password" wire:model="">
                                                                        </div> 
                                                                    </form>
                                                                    <button type="submit" class="btn btn-primary me-2" form="update_user{{$user->id}}">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            <!-- delete modal -->
                                            <div wire:ignore.self class="modal right fade" id="deleteUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                                                    <!-- <p class="card-description">
                                                                        Basic form layout
                                                                    </p> -->
                                                                    <form class="forms-sample" wire:submit.prevent="destroy" id="delete_user{{$user->id}}">                                                        
                                                                        <h5 class="card-description">
                                                                            are you sure to delete user
                                                                        </h5>   
                                                                    </form>    
                                                                    <button type="submit" class="btn btn-primary me-2" form="delete_user{{$user->id}}">yes delete</button>
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
                                        {{$users->links()}}
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
