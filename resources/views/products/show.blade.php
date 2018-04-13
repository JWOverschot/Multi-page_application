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