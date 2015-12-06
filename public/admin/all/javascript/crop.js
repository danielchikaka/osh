$(document).ready(function(){
	$('.image-editor').cropit({
			imageBackground: true,
			imageBackgroundBorderWidth: 15 // Width of background border
	});

	$('.select-image-btn').click(function() {
	  $('.cropit-image-input').click();
	});

    $('#photo-form').submit(function(e) {
    	// e.preventDefault();
      // Move cropped image data to hidden input
      var imageData = $('.image-editor').cropit('export');
      var data = $('.hidden-image-data').val(imageData);
      var inputs = $(this).serialize();
    
    });
});
