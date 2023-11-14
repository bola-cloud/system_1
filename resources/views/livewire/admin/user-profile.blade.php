<div>
    <!-- <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">Johnatan Smith</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">example@example.com</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">(097) 234-5678</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Mobile</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">(098) 765-4321</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>                  
    </div> -->

    <div class="container rounded bg-white mt-1 ms-3 me-1 mb-5" style="cursor: auto;">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            @if(Session::has('warning'))
                <div class="alert alert-warning" role="alert">{{Session::get('warning')}}</div>
            @endif
        <div class="row">
            <div class="col-md-3 border-end">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px"
                 src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                 <span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
            </div>
            <div class="col-md-5 border-end">
                <form wire:submit.prevent="update">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Full Name</label>
                                <input type="text" class="form-control" placeholder="Your name" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Phone number</label>
                                <input type="text" class="form-control" placeholder="phone" wire:model="phone">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-3 border-bottom">
                            <div class="form-group">
                                <label for="exampleInputUsername1">user category</label>
                                <select class="form-control form-control-sm" id="exampleFormControlSelect3" wire:model="category">
                                    <option selected>user</option>
                                    <option>admin</option>
                                    <option>manager</option>      
                                </select>
                                @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> 
                        </div>
                        <div class="row mt-5">
                            <div class="form-group">
                                <label for="password">Old Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="password" wire:model="old_password">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> 
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="password" wire:model="new_password">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> 
                            <div class="form-group">                                             
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm" id="password_confirmation" wire:model="password_confirmation">
                                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit" >Save Profile</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 mt-5 d-flex flex-column align-items-center text-center">
                <div class="border-bottom">
                    <h3 class="mb-3">User statics and data</h3>
                </div>
                <div class="mt-3">
                    <p class="statistics-title">Total orders</p>
                    <h3 class="rate-percentage">{{$Total_orders}}</h3>
                    <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                </div>
                <div class="mt-1">
                    <p class="statistics-title">Total income</p>
                    <h3 class="rate-percentage">{{$Total_income}}</h3>
                    <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                </div>
                <div class="mt-1 ">
                    <p class="statistics-title">Last login </p>
                    <h5 class="rate-percentage">{{$Last_login}}</h3>
                </div>
                <!-- <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<style>

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
