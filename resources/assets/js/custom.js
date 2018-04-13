// Carousel buttons
$(document).ready(()=>{
	$('.carousel-control-prev').on('click', (ele) => {
		$(ele.currentTarget.parentElement).carousel('prev')
	})
	$('.carousel-control-next').on('click', (ele) => {
		$(ele.currentTarget.parentElement).carousel('next')
	})
})
