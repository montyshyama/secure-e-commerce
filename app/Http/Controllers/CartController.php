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
		$duplicate = Cart::search(function ($cartItem, $rowId) use ($request) {
				return $cartItem->id === $request->id;

		});
		if($duplicate->isNotEmpty()) {

			return redirect()->back()->with('msg', 'Item is already in your cart');
		}


		Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
		return redirect()->back()->with('msg', 'Item has been added to cart');

	}

	public function destroy($id) {

		//dd($id);
		Cart::remove($id);
		return redirect()->back()->with('msg', 'Item has been removed from cart');
	}

	public function saveLater($id) {
		//dd($id);

		$item = Cart::get($id);
		Cart::remove($id);

		$duplicate = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
				return $cartItem->id === $id;

		});
		if($duplicate->isNotEmpty()) {

			return redirect()->back()->with('msg', 'Item already saved for later');
		}
		

		Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

		return redirect()->back()->with('msg', 'Item has been saved for later');





	}
}
