    
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    	
    	{{ Form::label('name', 'Product Name:') }}
    	{{ Form::text('name', '', ['class' => 'form-control border-input', 'placeholder' => 'Macbook Air']) }}
       <span class="text-danger"> 
            {{ $errors->has('name') ? $errors->first('name') : '' }}
        </span>
    </div>

    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">

    	{{ Form::label('price', 'Price:') }}
    	{{ Form::text('price', '', ['class' => 'form-control border-input', 'placeholder' => '₹ 75,000']) }}
        <span class="text-danger"> 
            {{ $errors->has('price') ? $errors->first('price') : '' }}
        </span>
        
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

    	{{ Form::label('description', 'Description:') }}
    	{{ Form::textarea('description', '', ['class' => 'form-control border-input', 'placeholder' => 'Write something about the product here']) }}
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

