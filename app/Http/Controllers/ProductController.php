<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {


    }

    public function create() {

    	return view('admin.products.create');
    }

    public function store(Request $request) {

    	//dd($request->all());
    	//validate form
    	$request->validate([
    		'name' => 'required',
    		'price' => 'required',
    		'description' => 'required',
    		'image' => 'image|required'
    	]);

    	//upload image
    	if($request->hasFile('image')) {
    		$image = $request->image;
    		$image->move('uploads', $image->getClientOriginalName());
    	}

    	//store into database
    	Product::create([
    		'name' => $request->name,
    		'price' => $request->price,
    		'description' => $request->description,
    		'image' => $request->image->getClientOriginalName()
    	]);

    	//sessions message
    	$request->session()->flash('msg', 'Product added successfully!');

    	//redirect
    	return redirect('add');



    }

}
