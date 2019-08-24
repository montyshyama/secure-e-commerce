<?php

namespace App\Http\Controllers;
use App\User;
use App\Order;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index() {

    	//dd(auth()->guard('user')->user()->id);
    	
    	$id = auth()->guard('user')->user()->id;
    	$user = User::where('id', $id)->first();

    	return view('front.profile.index', compact('user'));

	}

	public function show($id) {
		//dd($id);
		$order = Order::find($id);
		return view('front.profile.details', compact('order'));
		



	}
}
