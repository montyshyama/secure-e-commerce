@extends('admin.layouts.master')

@section('page')
	Edit Product

@endsection

@section('content')
  
  	<div class="row">
        <div class="col-lg-10 col-md-10">
        	@include('admin.layouts.message')
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Product</h4>
                </div>

                <!--@if($errors->any())
                	<ul>
                	@foreach($errors->all() as $error)
                		<li>
                			{{ $error }}
                		</li>
                	@endforeach
                	</ul>	
                @endif
				-->
					
                <div class="content">
                    {!! Form::open(['url' => ['/admin/products', $product->id], 'files' => 'true', 'method' => 'put']) !!}
                        <div class="row">
                            <div class="col-md-12">
                              	    
							    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							    	
							    	{{ Form::label('name', 'Product Name:') }}
							    	{{ Form::text('name', $product->name, ['class' => 'form-control border-input', 'placeholder' => 'Macbook Air']) }}
							       <span class="text-danger"> 
							            {{ $errors->has('name') ? $errors->first('name') : '' }}
							        </span>
							    </div>

							    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">

							    	{{ Form::label('price', 'Price:') }}
							    	{{ Form::text('price', $product->price, ['class' => 'form-control border-input', 'placeholder' => '₹ 75,000']) }}
							        <span class="text-danger"> 
							            {{ $errors->has('price') ? $errors->first('price') : '' }}
							        </span>
							        
							    </div>

							    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

							    	{{ Form::label('description', 'Description:') }}
							    	{{ Form::textarea('description', $product->description, ['class' => 'form-control border-input', 'placeholder' => 'Write something about the product here']) }}
							        <span class="text-danger"> 
							            {{ $errors->has('descriptionn') ? $errors->first('description') : '' }}
							        </span>

							    </div>

							    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">

							    	{{ Form::label('image', 'Image:') }}
							    	{{ Form::file('image', ['class' => 'form-control border-input', 'id' => 'image']) }}
							        <div id="thumb-output"></div>
							        <span class="text-danger"> 
							            {{ $errors->has('image') ? $errors->first('image') : '' }}
							        </span>
							 
							    </div>


                            </div>
                      	</div>
                        <div class="form-group">

                        	{{ Form::submit('Update Product', ['class' => 'btn btn-info btn-fill btn-wd']) }}

                        </div>
                            
                        <div class="clearfix"></div>
                   	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection