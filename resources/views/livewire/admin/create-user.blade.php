<div>    
    <p class="card-description">
        <a href="#" style="float:right ;" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#addUser" >
            <i class="fa fa-plus"></i> Add new user
        </a>
    </p>


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
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1"> phone</label>
                                    <input type="number" class="form-control" placeholder="user phone" wire:model="phone">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">user category</label>
                                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" wire:model="category">
                                        <option selected>category</option>
                                        <option value="user" >User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                                </div> 
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="password" wire:model="password">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div> 
                                <div class="form-group">                                             
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm" id="password_confirmation" wire:model="password_confirmation">
                                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>