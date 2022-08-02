<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class CartController extends Controller
{
    public function index()
    {
        $products=Products::paginate(10);
        return view('cashers.add_tocart',compact('products'));
    }
}
