<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {

    	$products=Product::all();

    	return view('admin.products.view', compact('products'));
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
    	$request->session()->flash('msg', 'Product has been added');

    	//redirect
    	return redirect('/admin/products/create');



    }

    public function destroy($id) {

    	Product::destroy($id);
    	session()->flash('msg', 'Product has been deleted');
    	return redirect('/admin/products');
    }

    public function edit($id) {
    	//return $id;
    	$product = Product::find($id);
    	return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id) {

    	//return $id;
    	//find product
    	$product = Product::find($id);

    	//validate the form
    	$request->validate([
    		'name' => 'required',
    		'price' => 'required',
    		'description' => 'required'
    	]);
    	
    	//check if image is uploaded
    	if($request->hasFile('image')) {
    		//check if the old image exists inside folder
    		if(file_exists(public_path('uploads/').$product->image)) {
    			unlink(public_path('uploads/').$product->image);
    		}

    		//upload the new image
    		$image = $request->image;
    		$image->move('uploads', $image->getClientOriginalName());
    		$product->image = $request->image->getClientOriginalName();
    	}

    	//updating the product
    	$product->update([
    		'name' => $request->name,
    		'price' => $request->price,
    		'description' => $request->description,
    		'image' => $product->image
    	]);

    	//session message
    	$request->session()->flash('msg', 'Product updated successfully');

    	//redirect
    	return redirect('/admin/products');
	}

	public function show($id) {

		//return $id;
		$product = Product::find($id);
		return view('admin.products.details', compact('product'));
	}

}
