@extends('layouts.app')

@section('content')
	<h1>Products</h1>
	<div class="row">
	@if(count($products) > 0)
		@foreach($products as $product)
		<?php 
			$medias = json_decode($product->product_media);
		?>
		<div class="col-xs-12 col-md-4 mb-4">
			<div class="card">
				<div class="discount"><p>{{$product->product_discount_percentage}}&#37;</p></div>
				@foreach($medias as $media)
				<a href="/products/{{$product->product_id}}">
					@if($media->type == 'image')
						<img class="card-img-top" src="{{$media->url}}" alt="{{$media->alt}}">
					@else
						<img class="card-img-top" src="/no-image" alt="No image">
					@endif
				</a>
				@endforeach
				<div class="card-body">
					<a href="/products/{{$product->product_id}}"><h5 class="card-title">{{$product->product_name}}</h5></a>
					@if($product->product_discount_percentage != null)
					<div class="row">
						<p class="old-price col-6">&euro; {{$product->product_price}}</p>
						<p class="text-right col-6">&euro; {{$product->product_price - ($product->product_price * ($product->product_discount_percentage/100))}}</p>
					</div>
					@else
						<p class="text-right">&euro; {{$product->product_price}}</p>
					@endif
					<p class="card-text">{{$product->product_description}}</p>
				</div>
			</div>
		</div>
		@endforeach
	@else
		<p>No products yet</p>
	@endif
</div>
@endsection