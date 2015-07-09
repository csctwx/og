var $;

var gimpForIE = false;

//1) ashley rose doll 
//2) shoes 
//3) red heart
//4) cupcakes 
//5) teapot animates
//6) ashley rose 



soundManager.url = '/sites/all/themes/og/swf/';
soundManager.onready(function(){

	soundManager.preferFlash = true;
	soundManager.flashVersion = 9;
	if (soundManager.flashVersion != 8) {
  		soundManager.useHighPerformance = true;
  		soundManager.useFastPolling = true;
	}

  // SM2 has loaded - now you can create and play sounds!

 	var shoeSound = soundManager.createSound({
    	id: 'shoesSM',
    	url: '/sites/all/themes/og/sounds/ballet.mp3'
  	});

  	var barkSound = soundManager.createSound({
    	id: 'barkSM',
    	autoLoad: true,
    	url: '/sites/all/themes/og/sounds/dogbarking.mp3'
 	});

  	var FlowersCookiesPurseSound = soundManager.createSound({
    	id: 'FlowersCookiesPurseSoundSM',
        autoLoad: true,
        volume: 75,
    	url: '/sites/all/themes/og/sounds/flowers_cookies_purse.mp3'
	});

  	var HairDryerSound = soundManager.createSound({
    	id: 'HairDryerSound',
        autoLoad: true,
    	volume: 55,
    	url: '/sites/all/themes/og/sounds/hairdryer3.mp3'
	});
  
  	var TeaKettleSound = soundManager.createSound({
    	id: 'TeaKettleSound',
        autoLoad: true,
    	volume: 45,
    	url: '/sites/all/themes/og/sounds/teakettle2.mp3'
  	});

  	var HeartsSound = soundManager.createSound({
    	id: 'HeartsSound',
        autoLoad: true,
    	url: '/sites/all/themes/og/sounds/hearts.mp3'
  	});

  	var PageTurningSound = soundManager.createSound({
    	id: 'PageTurningSound',
        autoLoad: true,
    	url: '/sites/all/themes/og/sounds/pageturning.mp3'
  	});

  	var PinkDollSound = soundManager.createSound({
    	id: 'PinkDollSound',
        volume: 60,
        autoLoad: true,
    	url: '/sites/all/themes/og/sounds/pinkdoll.mp3'
  	});

	var PurpleDollSound = soundManager.createSound({
    	id: 'PurpleDollSound',
        autoLoad: true,
    	url: '/sites/all/themes/og/sounds/purpledoll.mp3'
  	});

  	var SunrayDollSound = soundManager.createSound({
    	id: 'SunrayDollSound',
        autoLoad: true,
    	url: '/sites/all/themes/og/sounds/sunraydoll.mp3'
  	});
	
  	var horseSound = soundManager.createSound({
    	id: 'horseSound',
        volume: 60,
        autoLoad: true,
    	url: '/sites/all/themes/og/sounds/horse.mp3'
	});
		
});

jQuery(document).ready(function($) {
	
	$ = jQuery;
	
	if($.browser.msie){
 		if($.browser.version < 9){
 			gimpForIE = true;
 		}
 	}
	
	jQuery("#tree").hide();

	var whereToBuy = new WhereToBuy("wheretobuy");
	var swing  = new Swing("swingGirl");
	
	var dress = new BeatingHeart("dress", 0, .05, 1.1, false, 1);
	var cookie = new BeatingHeart("cookie", 0, .05, 1.1, false, 1);

	var heart2 = new BeatingHeart("heart2", 0, .05, 1.1, false, 9999);
	var heart3 = new BeatingHeart("heart3", 6, .06, 1.15, true, 9999);
	//Red Heart
	var heart4 = new BeatingHeart("heart4", 3, .06, 1.15, false, 9999, true, /*delay*/ 4000, 200);
	
	var flower2 = new BeatingHeart("flower2", 0, .06, 1.2, false, 1);
	
	var doll2 = new BeatingHeart("doll2", 0, .02, 1.075, false, 9999);
	
	//Ashley-Rose
	var doll3 = new BeatingHeart("doll3", 0, .04, .8, false, 1, true, /*delay*/ 500, 50);
	var dryer = new Shake("dryer", 4, 8);
		
	var doll1 = new Shake("doll1", 4, 8);
	var horse = new Shake("horse", 4, 8);
	var dog = new Dog();
	
	var cupcake2 = new Cupcake(5000);
	
	var book = new Toggle("book");
	var book = new Toggle("book2");
	
	var teapot = new Toggle("teapot", true, 7000);
	var shoes = new Shoes(/*delay*/2000);
	
	jQuery("#tree").fadeIn();
});

function linkTo(url){

	window.location = url;
}

function Shoes(delay){
	var shoeLeft = jQuery("#tree").find("#shoeLeft");
	var shoeRight = jQuery("#tree").find("#shoeRight");
	var element = jQuery("#tree").find("#shoes");

	var fps = 30;
	var intervalspeed = 1000/fps;
	var isAnimating = false;
	//
		
	var op = shoeLeft.offset();
	var targetSpeed = .7;
	var targetRadius = 3;
	var speed  = 0.1;
	var radius = 0;
	var angle = 0;
	var ypos;
	var interval;
	
	
	if (op){
		var centerY = op.top;
	}
	
	element.hover(
		function(){
			ignoreForIntro = false;
			isOver(true);
		},function(){
			isOver(false);
		}
	);
	
	function isOver(over){
		if(over){
			
			targetRadius = 3;
			if(!isAnimating){

				interval = setInterval(doAnimate, intervalspeed);
				
							if(!ignoreForIntro){
				soundManager.stopAll();
				//playShoeSound();
				soundManager.play('shoesSM');				
				//			alert("notintro");
				}
			}
			isAnimating = true;
		
		}else{
			if(!ignoreForIntro){
				 targetRadius = .1;
			}
		}
	}

	
	ignoreForIntro = true;
	var introTimer = 0;
	setTimeout(function(){isOver(true);}, delay);
	
	function doAnimate(){

		
			if(ignoreForIntro){
				introTimer++;
			
				if(introTimer > 45){
					ignoreForIntro = false;
					isOver(false);
					
				}
			}
			
			centerY = 0;
		
			speed+=(targetSpeed - speed)/4;
			radius+=(targetRadius - radius)/4;
		
			ypos = centerY + Math.cos(angle) * radius;
			angle += speed;
			
			shoeLeft.css({ 'top' : ypos });
			shoeRight.css({ 'top' : -ypos });
			
			if(targetRadius < 1){
			
				if(Math.abs(targetRadius - radius) < .1){
					clearInterval(interval);
					isAnimating = false;
					speed = .01;
					
				}
				
			}
			
			//shoeLeft.offset({ top:ypos});
		
	}
}


function Toggle(divName,autoPlay, delay){
	var element = jQuery("#tree").find("#"+divName);
	
	var bookClosed = element.find("img.closed");
	var bookOpen = element.find("img.open");
	

	bookOpen.hide();
	element.hover(
		function(){
			;
			isOver(true);

					
		},function(){

			isOver(false);

		}
	);
	if (divName == "teapot"){
		setTimeout(function(){isOver(true);}, delay);
		setTimeout(function(){isOver(false);autoPlay = false;}, delay + 1000);
		
}
	function isOver(mouseover){
		if(mouseover){
			if (divName == "teapot" && autoPlay == false){
				soundManager.stopAll();
				soundManager.play('TeaKettleSound');
			}
			if (divName == "book" || divName == "book2"){
				soundManager.stopAll();
				soundManager.play('PageTurningSound');
			}
			
			
			
			bookClosed.hide();
			bookOpen.show();
		}else{
			bookClosed.show();
			bookOpen.hide();
		}
		
	}

}

function Cupcake(delay){
	var element = jQuery("#tree").find("#cupcake2");
	var over = false;

	var graphic = element.find("img.image");
	
	var sparkles = element.find("#sparkles");
	var sparkleAlpha = 0;	
	sparkles.hide();
	var flickerCount = 0;
	var flickers = 6;

	var intervalspeed = 150;
	var interval;

	var animateForIntro = true;
	var introTimer = 0;
	setTimeout(function(){isOver(true);}, delay);	
	function doAnimate(){
		

//				playCupCakeSound();
			
		flickerCount++;
			
		if(sparkleAlpha == 0){
			sparkleAlpha = 1;
		}else{
			sparkleAlpha = 0;
		}
		
			
		if(sparkleAlpha==1){
			sparkles.show();
		}else{
			sparkles.hide();
		}
		
		
		if(animateForIntro){
			
			introTimer++;
			
			if(introTimer > 10 && sparkleAlpha==0){
				animateForIntro = false;
				isOver(false);
					
			}
		}
	}

	element.hover(
		function(){

			isOver(true);
		
		},function(){
		
			isOver(false);
		}
	);
	
	function isOver(mouseover){
				
		var ignoreRollover = false;
		
		if(over && mouseover){
			ignoreRollover = true;
		}
		
		if(!ignoreRollover){
			over = mouseover;
		
			if(mouseover){
				interval = setInterval(doAnimate, intervalspeed);
			}
		}
		
		if(!over){
			sparkleAlpha = 0;
			flickerCount = 0;
			clearInterval(interval);
		
			sparkleAlpha = 0;
			sparkles.hide();

		}
	}

}


function Dog(){
	var element = jQuery("#tree").find("#dog");
	var animate = false;
	var over = false;
	
	var graphic = element.find("img.image");
	
	var barking = element.find("#bark");

	barking.hide();
	var barkAlpha = 0;
		
	var originalPosition = graphic.position();
	
	var shakeCount = 0;
	var totalShakes = 6;
	
	var offsetX = 0;
	var offsetY = 0;
	
	var intervalspeed = 60;
	var interval;
	var range = 3;

	function doAnimate(){
		
		if(animate){
			
			shakeCount++;
			var rX;
			var rY;
			
			if(shakeCount < totalShakes){
				rX = range * -.5 + Math.random() * range;
				rY = range * -.5 + Math.random() * range;
				
				if(barkAlpha == 0){
				barkAlpha = 1;
					barking.show();
				}else{
				barkAlpha = 0;
					barking.hide();
				}
				
			}else{
				rX = 0;
				rY = 0;
				animate = false;
				shakeCount = 0;
				clearInterval(interval);
				barking.hide();
				barkAlpha = 0;
			}
			
			graphic.css('left', rX);
			graphic.css('top', rY);
		}
	}

	element.hover(
		function(){
			isOver(true);
		
		},function(){
			isOver(false);
		}
	);
	
	function isOver(mouseover){
		var ignoreRollover = false;
		if(over && mouseover){
			ignoreRollover = true;
		}
		
		if(!ignoreRollover){
		over = mouseover;
		
		if(mouseover){
			soundManager.stopAll();
			soundManager.play('barkSM');
			animate = true;	
			interval = setInterval(doAnimate, intervalspeed);
		}
		}
	}

}

function Shake(name, _range, _shakes){
	var element = jQuery("#tree").find("#"+name);
	var animate = false;
	var over = false;
	var graphic = element.find("img.image");
	
	var originalPosition = graphic.position();
	
	var shakeCount = 0;
	var totalShakes = _shakes;
	
	var offsetX = 0;
	var offsetY = 0;
	
	var intervalspeed = 40;
	var interval;

	function doAnimate(){
		
		if(animate){

			shakeCount++;
			var rX;
			var rY;
			
			if(shakeCount < totalShakes){
				rX = _range * -.5 + Math.random() * _range;
				rY = _range * -.5 + Math.random() * _range;
			}else{
				rX = 0;
				rY = 0;
				animate = false;
				shakeCount = 0;
				clearInterval(interval);
			}
			
			graphic.css('left', rX);
			graphic.css('top', rY);
			
		}
	}

	element.hover(
		function(){
			isOver(true);
		
		},function(){
			isOver(false);
		}
	);
	
	function isOver(mouseover){
		var ignoreRollover = false;
		if(over && mouseover){
			ignoreRollover = true;
		}
		
		if(!ignoreRollover){
		over = mouseover;
		
		if(mouseover){
						//THIS SHOULD BE A SWITCH STATEMENT
			if (name == "dryer") {				
				soundManager.stopAll();
				soundManager.play('HairDryerSound');
			}
			if (name == "doll1"){
				soundManager.stopAll();
				soundManager.play('PurpleDollSound');
			}
			if (name == "horse"){
				soundManager.stopAll();
				soundManager.play('horseSound');
			}
			animate = true;	
			interval = setInterval(doAnimate, intervalspeed);
		}
		}
	}

}

function Slider(name, _x, _y, _speed){
	var element = jQuery("#tree").find("#"+name);
	
	var animate = false;
	var over = false;

	var graphic = element.find("img.image");
	
	var originalPosition = graphic.position();
	
	var offsetX = 0;
	var offsetY = 0;
	var targetX = offsetX;
	var targetY = offsetY;
	var animationX = _x;
	var animationY = _y;
	
	//var animationStage = 0;
	
	var speed = _speed;
	
	var fps = 30;
	var intervalspeed = 1000/fps;
	setInterval(doAnimate, intervalspeed);
	
	
	function doAnimate(){
		
		if(animate){
			var moveX = (targetX - offsetX)/speed;
			var moveY = (targetY - offsetY)/speed;
		
			offsetX += moveX;
			offsetY += moveY;
			
			graphic.css('left', offsetX);
			graphic.css('top', offsetY);
			
			
			if(Math.abs(targetY - offsetY) < .5){
				//animationStage++;
				targetX = targetY = 0;
			}
			
		}
	}

	element.hover(
		function(){
			isOver(true);
		
		},function(){
			isOver(false);
		}
	);
	
	function isOver(mouseover){
		
		over = mouseover;
		
		if(mouseover){
			animate = true;	
			//animationStage = 0;
			targetX = animationX;
			targetY = animationY;

		}
	}

}

function BeatingHeart(name, _pauseLength, _speed, _maxScale, _doubleBeat, _maxBeats, autoPlay, delay, introLength){
	log(name + ": " + autoPlay);
	
	
	var element = jQuery("#tree").find("#"+name);
	
	var doBeat = false;
	var over = false;
	
	var beatCount = 0;
	var maxBeats = _maxBeats;
	
	//speed...
	var baseSpeed = _speed;//.035;
	var speed  = 0;
	var speedModifier = .9;
	
	//scale...
	var scale = 1;
	var maxScale = _maxScale;
	var hasDoubleBeat = _doubleBeat;
	var skipPauseInBeat = true;
	var minScale = 1;
	var invertScaleAnimation = _maxScale < 1;

	if(invertScaleAnimation){
		minScale = _maxScale;
		maxScale = 1;
	}

	//pause in beats... (length in frames)
	var pauseLength = _pauseLength;
	var pauseTimer = _pauseLength;
	var doPauseBeat = false;
	
	var heartGraphic = element.find("img.image");
	
	var startWidth = element.width();	
	var startHeight = element.height();	
	
	var originalPosition = heartGraphic.position();
	var offsetX = 0;
	var offsetY = 0;
	
	if(autoPlay==true){
		setTimeout(function(){isOver(true);}, delay);
		setTimeout(function(){isOver(false);autoPlay = false}, delay + 500);
	}
	var autoplayTimer = 10;
	
	element.hover(
		function(){
			isOver(true);
		
		},function(){
			isOver(false);
		}
	);
	
	function isOver(mouseover){
	
		over = mouseover;
		
		if(mouseover){
			//console.log("autoplay = " + autoPlay);
			
			//Red Heart
			if (name == "heart4"){
				soundManager.stopAll();
				if (autoPlay==false){
					soundManager.play('HeartsSound');
				}
			}
			if (name == "heart2" || name == "heart3"){
				soundManager.stopAll();
				soundManager.play('HeartsSound');
			}
			if (name == "cookie" || name == "flower2" || name == "dress"){
				soundManager.stopAll();
				soundManager.play('FlowersCookiesPurseSoundSM');
				
			}
			if (name == "doll2"){
				soundManager.stopAll();
				soundManager.play('PinkDollSound');
			}
			if (name == "doll3"){
				soundManager.stopAll();
				soundManager.play('SunrayDollSound');
			}
			
			

			
			speed = baseSpeed;	
			doBeat = true;	
			doPauseBeat = false;
			beatCount = 0;
			
		}
	}

	var fps = 30;
	var intervalspeed = 1000/fps;
	setInterval(doAnimate, intervalspeed);
	
	function doAnimate(){
		
		
		if(doBeat){
		
			if(scale >=maxScale){
				//reverse, scale back down to 1
				speed=-baseSpeed;
				
				if(!over && invertScaleAnimation){
					scale = 1;
					doBeat = false;	
					skipPauseInBeat = true;
				}
				
			}else if(scale <= minScale && speed < 0){
				//if the heart is shrinking and we've equalled and dropped
				//below the original scale then reverse and scale back up to max scale
				
				scale = minScale;
				
				beatCount++;
			
				if(beatCount >= maxBeats && !autoPlay){
					isOver(false);
				}	
		
		
				if(pauseLength > 0){
					//this is a heart that has a pause in the beat
					
					if(hasDoubleBeat && skipPauseInBeat){
						//this heart has a double beat, and should only pause on alternating beats
						
						skipPauseInBeat = false;
						doPauseBeat = false;
						pauseTimer = 0;
						speed=baseSpeed;
							
					}else{
						
						doPauseBeat = true;
						pauseTimer++;
						
						if(pauseTimer >= pauseLength){
							doPauseBeat = false;
							pauseTimer = 0;
							skipPauseInBeat = true;
							speed=baseSpeed;
						}
					}

				}else{
					speed=baseSpeed;
				}		
						
				
				//if the user has rolled off, end the animation here
				if(!over && !invertScaleAnimation){
					scale = minScale;
					doBeat = false;	
					skipPauseInBeat = true;
				}

				
	
			}
			
			
			if(!doPauseBeat){
				
				speed*=speedModifier;
				scale+=speed;	
				if(scale < minScale)scale = minScale;
						
				heartGraphic.width(startWidth * scale);
				heartGraphic.height(startHeight * scale);
			
				offsetX = (heartGraphic.width() - startWidth) * -.5;
				offsetY = (heartGraphic.height() - startHeight) * -.5;
			
				heartGraphic.css('left', offsetX);
				heartGraphic.css('top', offsetY);
			}
			
			
		}
		if(autoPlay){
			//console.log("heart beat test");
				autoplayTimer++;
				if(autoplayTimer > introLength){
					autoPlay = false;
					isOver(false);
				}
			}
		//heartGraphic.effect("scale", { percent: scale, direction: 'both' });
		
	}
};


function WhereToBuy(name){
	var counter = 0;
	var element = jQuery("#tree").find("#"+name);
	var speed  = 0;
	var range  = 2;
	

	var ribbons = element.find("#bottom");
	
	//var op = ribbons.offset();
	

	element.hover(
		function(){
			if(counter == 0){
				counter = 4;
				speed = -1;
			}
		},function(){
			//bounce = false;
		}
	);
	

	var fps = 30;
	var intervalspeed = 1000/fps;
	setInterval(doAnimate, intervalspeed);
	
	var y = 40;
	var speed = 1;
	
	function doAnimate(){
		if(counter > 0){
			
			
			
			if(y < 38){
				speed = 2;
				counter--;	
			}else if(y > 42){
				 speed = -2;
				 counter--;	
			}
			y+=speed;
			ribbons.css('top', y);
			
				
		}
	}	
}


function Fruit(name){
	var counter = 0;
	var element = jQuery("#tree").find("#"+name);
	var bounce = false;
	var speed  = 0;
	
	var gravity = 1;

	var bounceGraphic = element.find("img.image");
	
	var op = bounceGraphic.offset();

	element.hover(
		function(){
			bounce = true;
			speed = 5;
		},function(){
			bounce = false;
		}
	);
	

	var fps = 30;
	var intervalspeed = 1000/fps;
	setInterval(doAnimate, intervalspeed);
	
	function doAnimate(){
	
		var x  =bounceGraphic.offset().left;
		var y = bounceGraphic.offset().top;

		
		speed+=gravity;
		y+=speed;
		
		if(y > op.top) {
			y =  op.top;
			if(bounce){
				speed*=-1;		
			}else{
				speed*=-.5;
			}
		}

				
		bounceGraphic.offset({ top:y, left: x});
		
	}
};




function Swing(divName){

	
	var swingingGirl = jQuery("#tree").find("#"+divName);
	var swing = swingingGirl.find("#swing");
	var hit = swingingGirl.find("#hit");

	hit.css({ 'position' : 'absolute' });
	hit.css({ 'top' : 60 });
	hit.css({'z-index' : 2});

		
	var fps = 30;
	var intervalspeed = 1000/fps;
	setInterval(doAnimate, intervalspeed);
	
	var targetSpeed = .05;
	var targetRadius = 15;
	
	var speed  = 0.02;
	var radius = 0;
	
	var angle = 0;
	var xpos;
	var ypos;
	var centerX = 0;
	var centerY = 0;

	
	function doAnimate(){
			speed+=(targetSpeed - speed)/20;
			radius+=(targetRadius - radius)/20;
		
			xpos = centerX + Math.cos(angle) * radius;
			//ypos = centerY + Math.sin(angle) * radius;
			var distance = Math.abs(centerX - xpos);
			
			ypos = centerY - distance/3;
			angle += speed;
			
			ypos = Math.abs(ypos);
			
			ypos = Math.round(ypos);
			xpos = Math.round(xpos);
			
			swing.css({ 'top' : -ypos, 'left':xpos });
	}
}