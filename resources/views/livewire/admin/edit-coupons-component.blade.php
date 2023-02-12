<div>
    <div class="card">
        <div class="card-body">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <h4 class="card-title">Create Coupons </h4>
            <p class="card-description">
            create fixed or percent discound
            </p>
            <form class="forms-sample" wire:submit.prevent="updateCoupon">
                <div class="form-group">
                    <label for="exampleInputUsername1">Coupon code </label>
                    <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Coupon code" wire:model="code">
                    @error('code') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Coupon type</label>
                    <select class="form-control form-control-sm" wire:model.defer="type">
                        <option value="">select</option>
                        <option value="percent" selected>percent</option>
                        <option value="fixed">fixed</option>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="exampleInputUsername1">Coupon value </label>
                    <input type="number" class="form-control" id="exampleInputUsername1" placeholder="Coupon value" wire:model="value">
                    @error('value') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">cart value </label>
                    <input type="number" class="form-control" id="exampleInputUsername1" placeholder="cart value" wire:model="cart_value">
                    @error('cart_value') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">update</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
