@foreach($products as $product)
	<?php 
		$medias = json_decode($product->product_media);
	?>
	<div class="col-xs-12 col-md-4 mb-4">
		<div class="card">
			@if($product->product_discount_percentage != null)
				<div class="discount"><p>{{$product->product_discount_percentage}}&#37;</p></div>
			@endif
			@foreach($medias as $media)
			<a href="/products/{{$product->product_id}}">
				@if($media->type == 'image')
					<img class="card-img-top img-thumbnail" src="/storage/product_images/{{$media->url}}" alt="{{$media->alt}}">
					<?php break?>
				@else
					<img class="card-img-top img-thumbnail" src="/storage/product_images/no-image.jpg" alt="No image">
					<?php break?>
				@endif
			</a>
			@endforeach
			<div class="card-body">
				<a href="/products/{{$product->product_id}}"><h5 class="card-title">{{$product->product_name}}</h5></a>
				@if($product->product_discount_percentage != null)
				<div class="row">
					<p class="old-price col-6">&euro; {{number_format($product->product_price, 2)}}</p>
					<p class="text-right col-6">&euro; {{number_format($product->product_price - ($product->product_price * ($product->product_discount_percentage/100)), 2)}}</p>
				</div>
				@else
					<p class="text-right">&euro; {{number_format($product->product_price, 2)}}</p>
				@endif
				<a class="btn btn-outline-primary col-12" href="{{route('product.addToCart', ['id' => $product->product_id])}}" role="button"><i class="fa fa-cart-plus"></i></a>
			</div>
		</div>
	</div>
@endforeach