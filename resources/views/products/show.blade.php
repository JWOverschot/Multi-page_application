@extends('layouts.app')

@section('content')
	<?php 
		$medias = json_decode($product->product_media); 
		$specifications = json_decode($product->product_specifications);
	?>
		<h3>{{$product->product_name}}</h3>
		@if($product->product_discount_percentage != null)
			<p style="text-decoration: line-through;">&euro; {{$product->product_price}}</p>
			<p>&euro; {{$product->product_price - ($product->product_price * ($product->product_discount_percentage/100))}}</p>
			<p>{{$product->product_discount_percentage}} &#37;</p>
		@else
			<p>&euro; {{$product->product_price}}</p>
		@endif
		<p>{{$product->product_description}}</p>
		@foreach($medias as $media)
			@if($media->type == 'image')
				<img src="{{$media->url}}" alt="{{$media->alt}}">
				<p>*not actual size</p>
			@elseif($media->type == 'video')
				<video src=""{{$media->url}}"></video>
			@endif
		@endforeach
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