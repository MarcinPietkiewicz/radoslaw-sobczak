$(document).ready(function() {

$('.image-link').magnificPopup({ 
  type: 'image',
});

$('.parent-container').magnificPopup({
  delegate: 'a', // child items selector, by clicking on it popup will open
  type: 'image'
  // other options
});

	$('.simple-ajax-popup-align-top').magnificPopup({
		type: 'ajax',
		alignTop: true,
		overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
	});

	$('.simple-ajax-popup').magnificPopup({
		type: 'ajax'
	});
	



$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			 titleSrc: function(item) { return item.el.attr('title') + '<small> Publisher - Cultura Animi Foundation.</small>'; 
			}
		}
	});





$('.first-popup-link, .second-popup-link, .third-popup-link, .fourth-popup-link, .fifth-popup-link').magnificPopup({
  closeBtnInside:true
});

});