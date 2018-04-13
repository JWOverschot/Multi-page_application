@extends('layouts.app')

@section('content')
	<h1>Edit Product</h1>
	{!! Form::open(['action' => ['ProductsController@update', $product->product_id], 'methode' => 'POST']) !!}
		<div class="form-group">
			{{Form::label('name', 'Name')}}
			{{Form::text('name', $product->product_name, ['class' => 'form-control'])}}
		</div>

		<div class="form-group">
			{{Form::label('description', 'Description')}}
			{{Form::textarea('description', $product->product_description, ['class' => 'form-control'])}}
		</div>

		<div class="row">
			<div class="col-6">
				<div class="form-group">
					{{Form::label('price', 'Price')}}
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">&euro;</span>
						</div>
						{{Form::number('price', $product->product_price, ['class' => 'form-control'])}}
					</div>
				</div>
			</div>
			
			<div class="col-6">
				<div class="form-group">
					{{Form::label('discount-percentage', 'Discount percentage')}}
					<div class="input-group">
						{{Form::number('discount-percentage', $product->product_discount_percentage, ['class' => 'form-control'])}}
						<div class="input-group-append">
							<span class="input-group-text">&#37;</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			{{Form::label('media', 'Photos and videos')}}
			<div class="custom-file">
				{{Form::file('media', ['class' => 'form-control custom-file-input', 'accept' => 'video/*, image/*'])}}
				{{Form::label('media', 'Choose photo or video', ['class' => 'custom-file-label'])}}
			</div>
		</div>

		<div class="form-group">
			{{Form::label('category[]', 'Category')}}
			{{Form::select('category[]', $options, $selectedOptions, ['class' => 'form-control', 'multiple' => 'multiple'])}}
		</div>

		<label>Specifications</label>
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					{{Form::label('specification-name', 'Specification name')}}
					{{Form::text('specification-name', '', ['class' => 'form-control'])}}
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					{{Form::label('specification-value', 'Specification value')}}
					{{Form::text('specification-value', '', ['class' => 'form-control'])}}
				</div>
			</div>
		</div>
		{{Form::hidden('_method', 'PUT')}}
		{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
	{!! Form::close() !!}

@endsection