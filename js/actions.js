jQuery(document).ready(function($) {
	var $ = jQuery;
	var targDiv = $('#content');
	var noFade = false;
	
	if ( $("body").hasClass("node-type-game") ){
		//targDiv = $('.node-game');
		//TODO:EIE: Target 
		//alert("it's a game");
		$('.node-game').append('<div id="game-targ">&nbsp;</div>');
		targDiv = $('#game-targ');
	}

	
	//alert("drag");
	$("div.messages").draggable();
	
	if ( $("#ajax-feature").length ) {
		myURL = $('#ajax-feature').data('url');
		//alert(myURL);
		targDiv.load(myURL);
	} else {
		//alert("no Feature");
	}
	
	
	/////////////////////
	// Open external links in a different browser
	//
	
	look_for_outside_links();
	

	
	if($.browser.msie){
 		if($.browser.version < 9){
 			noFade = true;
 		}
 	}
 	
 	// Polyfill placeholder text
 	$('input.custom-search-box').placeholder();
	$('input').placeholder();
 	
	//////////////////////////////
	//
	// Toggle Image
	//

	//toggle-image
	$('.toggle-image').click( function() {
		//if (event.keyCode == 192) {
		
			if ( $('.primary-image').is(":visible") == true ){
				$('.primary-image').hide();
				$('.secondary-image').show();
				if ( $('.primary-thumb').hasClass("off")){
					$('.secondary-thumb').hide();
					$('.primary-thumb').show();
				}
			} else {
				$('.primary-image').show();
				$('.secondary-image').hide();
				if ( $('.primary-thumb').hasClass("off")){
					$('.secondary-thumb').show();
					$('.primary-thumb').hide();
				}
			}
		//}
	});
	
	
	//////////////////////////////
	//
	//	Menus
	//

	var menuOuter = "#navigation ul.menu li";
	var menuInner = "#navigation ul.menu li ul.menu";
	
	var fadingIn = false;
	
	var config = {    
		over: fadeInMenu, // function = onMouseOver callback (REQUIRED)    
		timeout:100, // number = milliseconds delay before onMouseOut    
		out: fadeOutMenu // function = onMouseOut callback (REQUIRED)    
	};

	$(menuOuter).hoverIntent( config );
	
	function fadeInMenu(){
		log("Fade In");
		if (noFade == false){
			$(this).find("ul.menu").stop().fadeTo('fast', 1);
		} else {
			$(this).find("ul.menu").show();
		}
	}
	function fadeOutMenu(){
		log("Fade Out");
		if (noFade == false){
			$(this).find("ul.menu").stop().fadeTo('fast', 0).hide();
		} else {
			$(this).find("ul.menu").hide();
		}
	}



	//////////////////////
	// ACCESSORY ROLLOVERS
	//
	var fi = 600;
	var fo = 300;
	$(".roll.ul").hover(
	  function () {
		//$(".mag.ul").stop().fadeTo(fi,1);
		fadeMeTo($(".mag.ul"), fi, 1);
	  },
	  function () {
		//$(".mag.ul").stop().fadeTo(fo,0);
		fadeMeTo($(".mag.ul"), fo, 0);
	  }
	);
	$(".roll.ur").hover(
	  function () {
		//$(".mag.ur").stop().fadeTo(fi,1);
		fadeMeTo($(".mag.ur"), fi, 1);
	  },
	  function () {
		//$(".mag.ur").stop().fadeTo(fo,0);
		fadeMeTo($(".mag.ur"), fo, 0);
	  }
	);
	$(".roll.lr").hover(
	  function () {
		//$(".mag.lr").stop().fadeTo(fi,1);
		fadeMeTo($(".mag.lr"), fi, 1);
	  },
	  function () {
		//$(".mag.lr").stop().fadeTo(fo,0);
		fadeMeTo($(".mag.lr"), fi, 0);
	  }
	);
	$(".roll.ll").hover(
	  function () {
		//$(".mag.ll").stop().fadeTo(fi,1);
		fadeMeTo($(".mag.ll"), fi, 1);
	  },
	  function () {
		//$(".mag.ll").stop().fadeTo(fo,0);
		fadeMeTo($(".mag.ll"), fo, 0);
	  }
	);



	function fadeMeTo(_this, _t, _a ){
		if (noFade == false){
			$(_this).stop().fadeTo(_t,_a);
		} else {
			if (_a == 1){
				$(_this).show();
			} else {
				$(_this).hide();			
			}
			
		}
	}


	//////////////////////
	// SEARCH
	//

	$('.search-submitter').click( function() {
		//alert("okay");
		 $('#search-block-form').submit();
	});

	///////////////////////////////////////
	//
	//	TEMP LOGIN
	//	Hit ` to see the login screen
	//

	/*
	$('#block-user-login h2').click( function() {
		var checkContent = $(this).parent().find(".content");
		//var checkContent = $(this);
		if ( checkContent.hasClass('open') ){
			checkContent.removeClass('open');
			checkContent.slideUp();
		} else {
			checkContent.addClass('open');
			checkContent.slideDown();		
		}
	});
	*/


	var xTriggered = 0;
	$('body').keydown(function(event) {
		
		//log(event.keyCode);
		if (event.keyCode == 192) {
			if ( $('#login-wrapper').is(":visible") == true ){
				$('#login-wrapper').hide();
			} else {
				$('#login-wrapper').show();
			}
		}
	});


	///////////////////////////////
	//
	//	Fivestar Voting 
	//

	$('#fivestar-custom-widget').after('<div class="fivestar-label">Average Rating</div>');
	$('#fivestar-custom-widget .star').click(function(){
		$('.fivestar-label').html('<div class="fivestar-label">Thanks for Rating!</div>')
	}); 


	///////////////////////////////
	//
	//	Increment Plus1
	//

	
	$('.heart-it-button').click( function() {
		var oldNum = parseInt( $(".heart-it-num ").text() );
		var newNum = oldNum + 1;
		//alert(oldNum + " heart it "+ newNum);
		$(".heart-it-num ").text(newNum);
		if (noFade == false){
			$('.heart-it-button').fadeOut();
		} else {
			$('.heart-it-button').hide();
		}
		
		var orig = $(".heart-it-inner h3").html();
		$(".heart-it-inner h3").html(orig.slice(0,-1));
		
		$.post('/ajax/vote.php', { nid:nodeID}, function(data) {
		  //log(data);
		});
		
		/*
		$.ajax({
		  type: 'POST',
		  url: "/ajax/vote.php",
		  data: 5530,
		  success: alert("Success"),
		  dataType: dataType
		});
		*/
	});

	//	   $(this).click(function(event) {
	//		   event.preventDefault();
	
	
	var vote_val = 0;
	var vote_id;
	var vote_parent;
	
	
	function findParentNode(_this, _match){
		var matchedNode;
		
		var found = false;
		var testMatch = _this;
		var repeatTimes = 100;
	
		$('.vote-button').removeClass("active");
		$(this).addClass("active");
		
		// Crawls up parent element until it finds one with a nodeID
		// The same as ParentUntil() in newer versions of jQuery
		while (found == false){
			testMatch = $(testMatch).parent();
			repeatTimes -= 1;
			if ( testMatch.hasClass(_match)){
				matchedNode = testMatch;
				found = true;
			}
			
			if (repeatTimes <= 0){
				found = true;
			}
		}
		
		return matchedNode;
	}
	
	$('.vote-button').click( function(event) {
		event.preventDefault();
		//var foundPoll = false;
		var testPoll = findParentNode(this,"node-poll");
		$('.vote-button').removeClass("active");
		$(this).addClass("active");
		
		vote_parent = testPoll;
		var myNID = testPoll.attr("id");
		
		vote_id = myNID;
		
		vote_val = 0;
		if ($(this).hasClass("vote-yes")){
			vote_val = 1;
		}
	});		


	$('.vote-submit').click( function(event) {
		log("Submitted");
		
		$.post('/ajax/polls.php', { nid:vote_id, vote:vote_val}, function(data) {
			  log("Voted: " + vote_val);
		});
		
		vote_parent = findParentNode(this,"node-poll");
		var results_display = $(vote_parent).find(".poll-results");
		var vote_display = $(vote_parent).find(".choices");
		
		results_display.fadeIn();
		vote_display.fadeOut();
	});
	
	$('.vote-cancel').click( function(event) {
		vote_parent = findParentNode(this,"node-poll");
		var results_display = $(vote_parent).find(".poll-results");
		var vote_display = $(vote_parent).find(".choices");
		
		results_display.fadeOut();
		vote_display.fadeIn();
	});
	
	///////////////////////////////
	//
	//	Video Load
	//

	$('.node-hair-do').click( function() {
		var myVid = $(this).find(".field-name-field-video .field-item").text();
		myVid = myVid.replace("youtu.be", "youtube.com/embed");
		myVid = myVid.replace("www.youtube.com/watch?v=", "youtube.com/embed/");
		myVid = myVid.replace("&feature=related", "");
		myVid = myVid.replace("&NR=1", "");
		showVideo(myVid);
	});
	
	function showVideo(_v){
		var vEmbed = '<iframe width="425" height="349" src="' + _v + '" frameborder="0" allowfullscreen></iframe>';
		log(vEmbed);
		var targ = $(".youtube_player");
		var wrap = $(".video_overlay");
		
		targ.html(vEmbed);
		wrap.show();
	}



	// This handles the negative offsets when browser is scaled to small widths
	// without this we have weird margins on the righ when scaling below boundWidth -- EIE
	var boundWidth = 1100;
	var minWidth = 990;
	$(window).resize( function() {
		recenter();
	});
	
	function recenter(_m){
		//alert("recenter");

		
		if ( $(window).width() < boundWidth && $(window).width() > minWidth){
			var newNum = ( ($(window).width() - boundWidth) ) + "px";
			log("newNum="+newNum);
			$("#page-wrapper").css("margin-left", newNum);
		} else {
			$("#page-wrapper").css("margin-left", 0);
		}
		if ( $(window).width() > minWidth ){
			$("#bookshelfContainer").css("left", -155);
		}
	}
	
	
	function reCenterOnLoad(){
		log("rReCenter="+$(window).width() + " bound: " + boundWidth);
		log("RreDiff="+($(window).width() - boundWidth) );
		
		// there was a bug in the math here -- reevaluate its neccessity
		if ( $(window).width() < boundWidth){
			var newNum = ( ($(window).width() - 1000) );
			//log("ReCenterOnLoad="+newNum);
			//$("#page-wrapper").css("margin-left", newNum);
		}
		
		//$("#page-wrapper").css("margin-left", );
		//if ( $(window).width() <= minWidth ){
		//	var newNum = ($(window).width() - (minWidth + 165) );
		//	log("newNum="+newNum);
		//	$("#bookshelfContainer").css("left", newNum);
		//}
		
	}
	
	
	//delay(800).recenter();
	 var callRecenter = function()
	{
		reCenterOnLoad();
	}
	window.setTimeout(callRecenter,1000);
	
	log("start");
	log( $('a.two-item') );

	$('a.two-item').next('ul').addClass('two-item');
	$('a.four-item').next('ul').addClass('four-item');
});

var d = new Date();
log( "Now is: " + d.getMilliseconds() );
var bp = '/sites/all/themes/og/js/plugins/';

Modernizr.load({
  test: Modernizr.backgroundsize,
  yep : bp + 'blank.js',
  nope: bp + 'backgroundsize-polyfill.js'
});



function look_for_outside_links(){
	var $ = jQuery;
	$('a').each(function() {
	   var a = new RegExp('/' + window.location.host + '/');
	   if(!a.test(this.href)) {
		   $(this).click(function(event) {
			   event.preventDefault();
			   event.stopPropagation();
			   window.open(this.href, '_blank');
		   });
	   }
	   
	   var pdf = new RegExp('.pdf');
	   if(pdf.test(this.href)) {
		   $(this).click(function(event) {
			   event.preventDefault();
			   event.stopPropagation();
			   window.open(this.href, '_blank');
		   });
	   }
	});
}



function log(_m){
	if (typeof console != 'undefined') {
		console.log(_m);
	}
}
