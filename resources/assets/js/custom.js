// Require array of genders
const genders = require('array-of-genders/genders.js');

$(document).ready(()=>{
	// Carousel buttons
	$('.carousel-control-prev').on('click', (ele) => {
		$(ele.currentTarget.parentElement).carousel('prev')
	})
	$('.carousel-control-next').on('click', (ele) => {
		$(ele.currentTarget.parentElement).carousel('next')
	})

	// Add specification row to products/edit.blade.php
	let specRow = 0
	$('#addSpecRow').on('click', (e) => {
		e.preventDefault()
		specRow++
		let specs = $('#specifications').children()
		let specName = $(specs[0]).clone().appendTo('#specifications')
		let specValue = $(specs[1]).clone().appendTo('#specifications')

		// input
		specName.find('#specification-name_0').attr({
			name: 'specification-name_' + specRow,
			id: 'specification-name_' + specRow,
		}).val('')
		// label
		specName.find('.specification-name').attr('for', 'specification-name_' + specRow)

		// input
		specValue.find('#specification-value_0').attr({
			name: 'specification-value_' + specRow,
			id: 'specification-value_' + specRow,
		}).val('')
		// label
		specValue.find('.specification-value').attr('for', 'specification-value_' + specRow)
	})

	// Gender selector on register page and profile edit
	if ($('.gender-selector').length > 0) {
		let gendersRev = genders.reverse()
		gendersRev.forEach((gender) => {
			let option = `<option value="${gender}">${gender}</option>`
			if ($('.gender-selector').hasClass(gender)){
				option = `<option value="${gender}" selected>${gender}</option>`
			}
			$('.gender-selector').after(option)
		})
	}
	// Delete post confirmation dialog
	$('#confirm-delete').on('show.bs.modal', function(e) {
    	$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
})

