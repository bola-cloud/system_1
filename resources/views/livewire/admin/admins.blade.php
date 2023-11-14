<div wire:ignore class="container">
    <!-- search -->
    <div class="container mb-3">
        <div class="col-md-6">
            <div class="row">
                <div class="search-form">                          
                    <div class="search">
                        <!-- <i class="fa fa-search"></i> -->
                        <input type="search" class="form-control" placeholder="Search for user?" wire:model="search" defer >
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
                                @livewire('admin.create-user')
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
                                            @foreach($admins as $key => $admin)
                                            <tr>
                                                <td>{{$admin->id}}</td>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->phone}}</td>
                                                <td>{{$admin->category}}</td>
                                                <td>
                                                    <a class="badge badge-danger"  href="#" wire:click="delete({{$admin->id}})" 
                                                    data-bs-toggle="modal" data-bs-target="#deleteUser{{$admin->id}}">delete</a>

                                                     <a class="badge badge-warning" href="{{route('User_profile',['user_id'=>$admin->id])}}" >view profile</a>

                                                </td>
                                            </tr>                                         
             
                                            <!-- delete modal -->
                                            <div wire:ignore>
                                                <div class="modal right fade" id="deleteUser{{$admin->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                                                        <form class="forms-sample" wire:submit.prevent="destroy" id="delete_user{{$admin->id}}">                                                        
                                                                            <h5 class="card-description">
                                                                                are you sure to delete user
                                                                            </h5>   
                                                                        </form>    
                                                                        <button type="submit" class="btn btn-primary me-2" form="delete_user{{$admin->id}}">yes delete</button>
                                                                    </div>
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
                                        {{$admins->links()}}
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

