<div class="container mt-4">
    <form action="#" method="get" name="frm-billing">

        <div class=" main-content-area">
            <div class="wrap-address-billing">
                <h3 class="box-title mb-3">Billing Address</h3>
                    <p class="row-in-form">
                        <label for="fname">first name<span>*</span></label>
                        <input id="fname" type="text" name="fname" value="" placeholder="Your name" wire:model="first_name">
                    </p>
                    <p class="row-in-form">
                        <label for="phone">Phone number<span>*</span></label>
                        <input id="phone" type="number" name="phone" value="" placeholder="11 digits format" min="1" max="10" wire:model="Phone_number">
                    </p>
               
            </div>
        </div>
        <div class="summary summary-checkout"> 
            <div class="summary-item shipping-method">
                <h4 class="title-box f-title">Shipping </h4>
                <div class="payment-item">
                    <input name="collapseGroup" type="radio" data-toggle="collapse" data-target="#collapseOne"/> Yes
                    <input name="collapseGroup" class="shipping-radio" type="radio" data-toggle="collapse" data-target="#collapseOne" checked/> No
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    shipping order
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class="row-in-form">
                                        <label for="fname">Address <span>*</span></label>
                                        <input id="fname" class="address-input" type="text" name="" value="" placeholder="Enter Address" wire:model="Address">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="fname"> shipping fee <span>*</span></label>
                                        <input id="fname" class="address-input" type="number" name="" value="" placeholder="Enter shipping fee" wire:model="shipping_fee">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
            <div class="summary-item payment-method">
                <h4 class="title-box">Payments</h4>
                <p class="summary-info"><span class="title">Check / Money order</span></p>
                <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">$100.00</span></p>
                <button class="btn btn-medium" type="submit">Place order now</button>
            </div>
        </div>
    </form>

</div>
