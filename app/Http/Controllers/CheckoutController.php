<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
    	return view('front.checkout.index');


	}

	public function store(Request $request) {

        $contents = Cart::instance('default')->content()->map(function($item) {
            return $item->model->name . ' ' . $item->qty;
        })->values()->toJson();


    }

}
