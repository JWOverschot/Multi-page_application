@extends('layouts.app')

@section('content')
	<h1>Create Product</h1>
	{!! Form::open(['action' => 'ProductsController@store', 'methode' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="form-group">
			{{Form::label('name', 'Name')}}
			{{Form::text('name', '', ['class' => 'form-control'])}}
		</div>

		<div class="form-group">
			{{Form::label('description', 'Description')}}
			{{Form::textarea('description', '', ['class' => 'form-control'])}}
		</div>

		<div class="row">
			<div class="col-6">
				<div class="form-group">
					{{Form::label('price', 'Price')}}
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">&euro;</span>
						</div>
						{{Form::number('price', '', ['class' => 'form-control', 'step' => '.01'])}}
					</div>
				</div>
			</div>
			
			<div class="col-6">
				<div class="form-group">
					{{Form::label('discount-percentage', 'Discount percentage')}}
					<div class="input-group">
						{{Form::number('discount-percentage', '', ['class' => 'form-control'])}}
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
			{{Form::label('category', 'Category')}}
			<select name="category[]" class="custom-select" multiple>
				@foreach($categories as $category)
					<option value="{{$category->category_id}}">{{$category->category_name}}</option>
				@endforeach
			</select>
		</div>

		<label for="specification-name">Specifications</label>
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

		{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
	{!! Form::close() !!}

@endsection