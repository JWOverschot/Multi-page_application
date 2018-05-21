$(document).ready(()=>{
	let previousVal
	// Change amount of items
	$('.cart-product-amount').on('focus', function (e) {
	        // Store the current value on focus and on change
	        previousVal = this.value
	}).on('change', (e) => {
		let itemId = e.currentTarget.id.split('_')[1]
		// add to cart
		if ($('.cart-product-amount').val() > previousVal) {
			$.ajax({
				method: 'POST',
				url: '/add-to-cart/' + itemId,
				data: {id: itemId},
				dataType: "html"
			})
			.fail((err) => {
		   		console.error(err)
		  	})
			.done(( msg ) => {
				console.error( 'Data Saved: ' + msg )
			})
		}
		// remove from cart
		else if ($('.cart-product-amount').val() < previousVal) {
			$.ajax({
				method: 'POST',
				url: '/remove-one-from-cart/' + itemId,
				data: {id: itemId},
				dataType: "html"
			})
			.fail((err) => {
		   		console.error(err)
		  	})
			.done(( msg ) => {
				console.error( 'Data Saved: ' + msg )
			})
		}
	})
})