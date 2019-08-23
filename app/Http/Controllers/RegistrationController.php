<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function index() {

    	return view('front.registration.index');

	}

	public function store(Request $request) {

		//dd($request);
		//validate the request
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'address' => 'required',
			'phone' => 'required'

		]);

		//create the user
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'address' => $request->address,
			'phone' => $request->phone

		]);

		//sign the user in
		Auth::guard('user')->login($user);
		//echo "registration successful!";
		
		//redirect to profile
		return redirect('/user/profile');




	} 
}
