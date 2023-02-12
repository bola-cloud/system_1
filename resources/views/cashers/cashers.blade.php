@extends('layouts.bars.navbar')

@section('navbar')


<div class="container mt-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4  style="float:left">Add casher</h4>
                            <a href="#" style="float:right ;" class="btn-btn-primary" data-toggle="modal" data-target="#addUser" >
                                <i class="fa fa-plus"></i> Add new casher
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name </th>
                                        <th>phone</th>
                                        <th>category</th>
                                        <th>last login</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->category}}</td>
                                        <td>time</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#editUser{{$user->id}}" class="btn btn-primary mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser{{$user->id}}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                     <!-- modal to edit user -->
                                    <div class="modal right fade" id="editUser{{$user->id}}" data-backdrop="static" data-keyboard="false"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{$user->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.update', $user->id) }}"  method="POST" id="edit">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">phone</label>
                                                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Password</label>
                                                        <input type="password" name="password" value="{{$user->password}}" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password" name="confirm_Password" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for=""> category</label>
                                                        <select class="form-control" name="category">
                                                            <option value="admin" {{$user->category =='admin' ?'selected="selected"' :''}} value="admin">admin</option>
                                                            <option value="user"{{$user->category =='user' ?'selected="selected"' :''}} value="user" >user</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-warning" form="edit" >Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal to delete user -->
                                    <div class="modal right fade" id="deleteUser{{$user->id}}" data-backdrop="static" data-keyboard="false"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{$user->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.destroy', $user->id) }}"  method="POST" id="delete">
                                                    @csrf 
                                                    @method('delete')
                                                    <p>Are you sure you want to delete {{$user->name}}</p>
                                                    
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default" data-dismiss="modal" > Cancel</button>
                                                <button class="btn btn-danger" type="submit" form="delete" > Delete</button>

                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="ml-3">
                            {{ $users->links()}}
                        </div>
                    </div>



                    <!-- Modals -->                                    

                    <!-- modal to add user -->
                    <div class="modal right fade" id="addUser" data-backdrop="static" data-keyboard="false"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('users.store') }}"  method="POST" id="nameform">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">phone</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="confirm_Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for=""> category</label>
                                        <select class="form-control" name="category">
                                            <option value="admin">admin</option>
                                            <option value="user">user</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" form="nameform" >create</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    

                </div>   <!-- end-col-md-9 -->

                <!--search-->

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>search user</h5>
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
<style>
    .modal.right .modal-dialog{
        top: 0;
        right: 20vh;
        margin-right: 0;
    }
    .modal.fade:not(.in).right .modal-dialog{
        -webkit-transform: translate3d(25%,0,0);
        transform:translate3d(25%,0,0);
    }
</style>
@endsection