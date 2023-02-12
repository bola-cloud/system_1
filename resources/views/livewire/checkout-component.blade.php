<div class="container mt-4">
    <form wire:submit.prevent="placeOrder" id="frm-billing">
        <div class=" main-content-area">
            <div class="wrap-address-billing">
                <h3 class="box-title mb-3">Billing Address</h3>
                    <p class="row-in-form">
                        <label for="fname">first name<span>*</span></label>
                        <input id="fname" type="text" name="cust_name" value="" placeholder="Your name" wire:model="first_name">
                        @error('first_name') <span class="text-danger">{{$message}}</span>@enderror
                    </p>
                    <p class="row-in-form">
                        <label for="phone">Phone number<span>*</span></label>
                        <input id="phone" type="number" name="phone" value="" placeholder="11 digits format" wire:model="Phone_number">
                        @error('Phone_number') <span class="text-danger">{{$message}}</span>@enderror
                    </p>
               
            </div>
        </div>
        <div class="summary summary-checkout"> 
            <div class="summary-item shipping-method">
                <h4 class="title-box f-title">Shipping </h4>
                <div class="payment-item">
                    <input name="collapseGroup" id="have-shipping" value="1" type="checkbox"  wire:model="haveShipping"/> Yes
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    shipping order
                                </h4>
                            </div>
                            <div class="">
                                @if($haveShipping ==1)
                                    <div class="panel-body">
                                        <p class="row-in-form">
                                            <label for="">Address <span>*</span></label>
                                            <input id="" class="address-input" type="text" name="" value="" placeholder="Enter Address" wire:model="Address">
                                            @error('Address') <span class="text-danger">{{$message}}</span>@enderror

                                        </p>
                                        <p class="row-in-form">
                                            <label for=""> shipping fee <span>*</span></label>
                                            <input id="" class="address-input" type="number" name="" value="" placeholder="Enter shipping fee" wire:model="shipping_fee">
                                            @error('shipping_fee') <span class="text-danger">{{$message}}</span>@enderror
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
            <div class="summary-item payment-method">
                <h4 class="title-box">Order summmary</h4>
                <p class="summary-info"><span class="title">subtotal</span><b class="index"> : {{Cart::instance('cart')->subtotal()}}</b></p>
                @if(Session::has('coupon'))
                    <p class="summary-info"><span class="title">discount</span><b class="index">{{$discount}}</b></p>
                    <p class="summary-info"><span class="title">tax </span><b class="index"></b></p>
                    <p class="summary-info"><span class="title">subtotal with discount</span><b class="index"></b></p>
                @else
                    <p class="summary-info"><span class="title">tax ({{config('cart.tax')}}%)</span><b class="index"> </b></p>
                    <p class="summary-info"><span class="title">shipping </span>
                        <b class="index">
                            @if($haveShipping ==1)
                                :{{$shipping_fee}}
                            @else
                                0
                            @endif
                        </b>
                    </p>
                    <p class="summary-info total-info"><span class="title">Total </span><b class="index">:  {{Cart::instance('cart')->total()}}</b></p>
                @endif
                @if(!Session::has('coupon'))
                    <div class="checkout-info">
                        <label for="" class="checkbox-field">
                            <input class="frm-input" name="have-code" id="have-code" type="checkbox" value="1"  wire:model="havecouponcode"><span class="ml-2">I have a coupon</span>
                        </label>
                        @if($havecouponcode ==1)
                        <form wire:submit.prevent="applyCoupon" id="coupon">
                            <h4 class="title-box">coupon code</h4>
                            @if(Session::has('coupon_message'))
                                <div class="alert alert-danger" role="danger">{{Session::get('coupon_message')}}</div>
                            @endif
                            <p class="row-in-form">
                                <input type="text" name="coupon-code" placeholder="Enter discound code" wire:model.defer="couponCode">
                                @error('couponCode') <span class="text-danger">{{$message}}</span>@enderror
                            </p>
                            <button type="submit" class="btn btn-small mb-3" form="coupon">apply</button>
                        </form>
                        <p class="summary-info"><span class="title">Discount </span><b class="index"> : {{$discount}} </b></p>
                        <p class="summary-info"><span class="title">totalAfterDiscount</span><b class="index"> :{{$totalAfterDiscount}} </b></p>
                        @endif
                        @if($haveShipping ==1)
                            <p class="summary-info grand-total"><span>Total with delivery</span> <span class="grand-total-price">{{Cart::instance('cart')->total()}}</span></p>
                        @endif
                    </div>
                @endif
                <button class="btn btn-medium" type="submit" form="frm-billing">Place order now</button>                
            </div>
        </div>
    <!-- </form> -->

</div>
