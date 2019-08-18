<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index() {

    	$products = Product::all();
    	//dd($products);
    	return view('front.index', compact('products'));
    	
    }
}
