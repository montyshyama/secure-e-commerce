<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function index() {
    	return view('front.sessions.index');
	}

	public function store(Request $request) {
		//dd($request);
		$rules = [
			'email' => 'required|email',
			'password' => 'required'
		];

		$request->validate($rules);

		//check if exists
		$data = $request->only('email', 'password');
		if(!Auth::guard('user')->attempt($data) ) {
			return back()->withErrors([
				'message' => 'Invalid Credentials'
			]);
		}//endif
		return redirect('/user/profile');
	}
}
