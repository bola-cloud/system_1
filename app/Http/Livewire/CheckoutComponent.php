<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Orders;
use App\OrderProduct;
use App\OrderItems;
use App\Products;
use App\Transactions;
use App\Coupon;
use Cart;
use Carbon\Carbon;
use Session;


class CheckoutComponent extends Component
{
    public $Phone_number;
    public $first_name;
    public $Address;
    public $shipping_fee = 0;
    public $haveShipping;
    public $havecouponcode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $totalAfterDiscount;
    public $subtotal;
    public $total;
    public $finishOrder;
    
    public function applyCoupon()
    {
        // dd($this->couponCode);
        $coupon=Coupon::where('code',$this->couponCode)->first();
        if(!$coupon)
        {
            session()->flash('coupon_message','coupon is invalid');
            return;
        }
        else if(!$coupon->cart_value > Cart::instance('cart')->subtotal())
        {
            session()->flash('coupon_message','cart_value is invalid');
            return;
        }
        $coupons=[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value
        ];
        Session::put('coupons',$coupons);
        $this->calculateDiscounts();
        // dd(session()->get('coupons'));
    }

    public function removeCoupon()
    {
        $this->discount=0;
        session()->forget('coupons');
    }

    public function calculateDiscounts()
    {
        if(session()->has('coupons'))
        {
            if(session()->get('coupons')['type']=='fixed')
            {
                $this->discount =session()->get('coupons')['value'];
            }
            else
            {
                $this->discount =(Cart::instance('cart')->subtotal() * session()->get('coupons')['value'])/100;
            }
            $this->total=Cart::instance('cart')->subtotal() - $this->discount;
        }
    
    }  

    public function placeOrder()
    {
        if(!Cart::instance('cart')->count()>0)
        {
            session()->flash('warning','cart is empty ');
            return redirect()->route('product.shop');
        }
        else if(Cart::instance('cart')->count()>0)
        {
            $this->validate([
                'first_name' => 'required|min:4|string',
                'Phone_number' => 'required|digits:11'
            ]);
            $order=new Orders();
            $order->user_id=Auth::id();
            $order->cust_name=$this->first_name;
            $order->phone=$this->Phone_number;
            $this->subtotal=session()->get('checkout')[0]['subtotal'];
            $order->subtotal=$this->subtotal;
            $order->is_shipping=$this->haveShipping ? 1:0;
            if($this->haveShipping)
            {
                $this->validate([
                    'Address'=>'required|min:4',
                    'shipping_fee'=>'required|numeric'
                ]);
                $order->address=$this->Address;
                $order->delivery=$this->shipping_fee;
                $order->status='delivered';
                if($this->couponCode)
                {
                    $this->total += $this->shipping_fee;
                    $order->discount=$this->discount;
                }
                else{
                    $this->total=$this->subtotal + $this->shipping_fee; 
                }
            }
            else{
                $order->status='ordered';
            }
            $order->total=$this->total;
            $order->save();
            foreach(Cart::instance('cart')->content() as $items)
            {   
                $product=Products::find($items->id);
                $quant=$product->quantity_inshop - $items->qty ;
                $product->quantity_inshop =$quant;
                $product->save();
                $orderItem= new OrderItems();
                $orderItem->product_id=$items->id;
                $orderItem->price=$items->price;
                $orderItem->order_id=$order->id;
                $orderItem->quantity=$items->qty;
                $orderItem->save();
                $findProducts=Products::find($items->id);
                $findProducts->orderItems()->attach([
                    $orderItem->id =>[
                        'created_at'=>now()
                    ]
                ]);
            }
            $transaction= new Transactions();
            $transaction->user_id=Auth::id();
            $transaction->order_id=$order->id;
            if($this->haveShipping)
            {
                $transaction->mode='on_delivery';
                $transaction->status='delevered';
            }
            else{
                $transaction->mode='cash';
                $transaction->status='approved';
            }
            $transaction->save();
            // $this->quantityAfterCheckout();
            $this->verifyAuth();
            $this->finishOrder=1;
            Cart::instance('cart')->destroy();
            $this->removeCoupon();
            $this->shipping_fee= null;
            session()->forget('checkout');
            session()->flash('success','checkout is success');
            return redirect()->route('product.shop');
        }
       
    }

    public function quantityAfterCheckout()
    {
        

    }

    public function updated($field)
    {
        $this->validateOnly($field,[
            'first_name' => 'required|min:4|string',
            'Phone_number' => 'required|numeric'
        ]);
    }

    public function verifyAuth()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->finishOrder)
        {
            return redirect()->route('product.shop');
        }
        else if(!session()->get('checkout'))
        {
            session()->flash('warning','cart is empty ');
            return redirect()->route('product.shop');
        }
    }
    

    public function render()
    {
        // if(session()->has('coupons'))
        // {
        //     if(Cart::instance('cart')->subtotal() < session()->get('coupons')['cart_value'])
        //     {
        //         session()->forget('coupons');
        //     }
        //     else{
        //         $this->calculateDiscounts();
        //     }
        // }
        return view('livewire.checkout-component')->layout('layouts.bars.navbar');
    }
}
