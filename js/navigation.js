jQuery(document).ready(function($) {
	var $ = jQuery;

	$.each(activePath, function(k,v){
		$i = 0;		
		$('div.region-navigation div.block-menu ul.menu li a').each(function(){
			if (v == $(this).html()) {
				//console.log('active='+v);
				$(this).addClass('active-trail');
			}

		});
	});
	
});
