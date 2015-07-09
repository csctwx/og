jQuery(document).ready(function($) {
	///////////////////////////////
	//
	//	Rotate Cloud
	//
	
	var iLength = 3800;	// Interval Length
	var ch = 0; 		// Current Slide Counter
	var slidecount = 0;	// Total Slides
	var noFade = false;	// For browsers that choke on fade animations
	
	// Add IE8 and below to No Fade list
	if($.browser.msie){
 		if($.browser.version < 9){
 			noFade = true;
 		}
 	}	
	// Add mobile browsers to No Fade if necessary
	
	slides_length = $(".home-rot").length;
	
	$(".home-rot").each(function (i) {
		$(this).addClass( ("slide-"+i) );
		slidecount = i;
	});
	$(".slide-0").show();
    
	cloud_interval = setTimeout(cloud_rotate,iLength); //time in milliseconds

	$('.home-left-nav').click( function() {
		if (cloud_interval){
			clearTimeout(cloud_interval);
		}
		cloud_rotate(0, 1);
	});

	$('.home-right-nav').click( function() {
		if (cloud_interval){
			clearTimeout(cloud_interval);
		}
		cloud_rotate(1, 1);
	});
	
	function cloud_rotate(_forw, _once) {
		var curString = ".slide-"+ch;

		
		if (_forw){
			ch++;
			if (ch > slidecount) ch = 0;
		} else {
			ch--;
			if (ch < 0) ch = slidecount;
		}


		var newString = ".slide-"+ch;
	
		if (slides_length > 1 ) {
			if (noFade == false){
				$(newString).fadeIn("fast");
				$(curString).fadeOut("fast");
			} else {
				$(newString).show();
				$(curString).hide();
			}
		}
		
		
		if (_once != 1){
			cloud_interval = setTimeout(cloud_rotate,iLength); 
		} else {
			clearTimeout(cloud_interval);
		}
		
	}
});