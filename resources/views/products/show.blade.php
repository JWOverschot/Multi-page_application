@extends('layouts.app')

@section('content')
	<h3>{{$product->product_name}}</h3>
	@if($product->product_discount_percentage != null)
		<p class="old-price">&euro; {{number_format($product->product_price, 2)}}</p>
		<p>&euro; {{number_format($product->product_price - ($product->product_price * ($product->product_discount_percentage/100)), 2)}}</p>
		<p>{{$product->product_discount_percentage}} &#37;</p>
	@else
		<p>&euro; {{number_format($product->product_price, 2)}}</p>
	@endif
	<p>{{$product->product_description}}</p>

	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
	  <div class="carousel-inner">
	  	<?php $active = 'active';?>
	  	@foreach($medias as $media)
			@if($media->type == 'image')
				<div class="carousel-item {{$active}}">
					<img class="img-fluid d-block w-100" src="/storage/product_images/{{$media->url}}" alt="{{$media->alt}}">
				</div>
			@elseif($media->type == 'video')
				<div class="carousel-item">
					<video class="d-block w-100" src=""{{$media->url}}"></video>
				</div>
			@endif
			<?php $active = '';?>
		@endforeach
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<caption>Spcificaties</caption>
	<table class="table table-striped">
		@foreach($specifications as $k=>$v)
			<tr>
				<td>{{$k}}</td>
				@if($v === true)
					<td>&#10004;</td>
				@elseif($v === false)
					<td>&#10060;</td>
				@else
					<td>{{$v}}</td>
				@endif
			</tr>
		@endforeach
	</table>
@endsection