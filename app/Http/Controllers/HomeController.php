<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index(){
        $product = new Product();
        $product->product_name = "Product 1";
        $product->product_description = "Product 1";
        $product->product_price = 99.90;

        $product->save();

        echo "Hello";
    }
}
