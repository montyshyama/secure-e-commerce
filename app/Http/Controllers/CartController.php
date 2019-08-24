<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function index() {

    	return view('front.cart.index');

	}

	public function store(Request $request) {

		//dd($request->all());
		Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
		return redirect()->back()->with('msg', 'Item has been added to cart');

	}

	public function destroy($id) {

		//dd($id);
		Cart::remove($id);
		return redirect()->back()->with('msg', 'Item has been removed from cart');
	}

	public function saveLater($id) {

		
	}
}
