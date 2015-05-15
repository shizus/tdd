"use strict";
jQuery(document).ready(function(){	
	jQuery('.portsingle.home .blogsingleimage img').hide();
	jQuery('.showpostload').hide();
	jQuery('.showpostpostcontent').hide();
	jQuery('.closeajax').hide();
	jQuery('.click').click(function() {
	var id = jQuery(this).attr("id");
	var url = jQuery('#root').attr("value");
	var invariable = id.split('_');
	var type = '';
	if(invariable[0] != 'post')
		type = '_port';
	else
		type = '_post';

	if(jQuery('#showpost-'+invariable[0]+' .main').is(":visible")){
		jQuery('html, body').animate({scrollTop:jQuery('#showpost-'+invariable[0]).offset().top-80}, 400);
		var oldheight = jQuery('#showpost-'+invariable[0]+' .main').height();
		jQuery('#showpost-'+invariable[0]+' .showpostpostcontent').fadeOut(200);	
		jQuery('#showpost-'+invariable[0]+' .showpostpostcontent').empty();
		jQuery('#showpost-'+invariable[0]+' .closehomeshow').fadeOut(200);		
		jQuery('#showpost-'+invariable[0]+' .showpostload').delay(200).fadeIn(200);
		if(oldheight > 500){
			var heightnew = oldheight - 500;
			jQuery('#showpost-'+invariable[0]).delay(300).animate({"height": "-="+heightnew+"px"}, 500);	
		}		
		if(oldheight < 500){
			var heightnew = 500 - oldheight ;
			jQuery('#showpost-'+invariable[0]).delay(300).animate({"height": "+="+heightnew +"px"}, 500);	
		}
			jQuery('#showpost-'+invariable[0]+' .showpostpostcontent').load(url+'/single_home'+type+'.php',{ 'id': invariable[1], 'type': invariable[0] } ,function () {

		jQuery('#showpost-'+invariable[0]+' .posttext img').imagesLoaded(function () {
			height = jQuery('#showpost-'+invariable[0]+' .showpostpostcontent').height();
			if(height >500) {
				heightnew = height - 500;
				jQuery('#showpost-'+invariable[0]).animate({"height": "+="+heightnew+"px"}, 500);
			}
			if(height < 500) {
				heightnew =  500 - height;
				jQuery('#showpost-'+invariable[0]).animate({"height": "-="+heightnew+"px"}, 500);
			}

			jQuery('#showpost-'+invariable[0]+' .showpostload').fadeOut(600);
			jQuery('#showpost-'+invariable[0]+' .showpostpostcontent').delay(700).fadeIn(200);
			jQuery('.closehomeshow-'+invariable[0]+'.closeajax').delay(700).fadeIn(200);
			} );
		} );
	}
	else{

		var height = 0;
		jQuery('#showpost-'+invariable[0]).animate({"height": "+=500px"}, 500);
		jQuery('#showpost-'+invariable[0]+' .showpostload').fadeIn(200);
		jQuery('#remove').delay(100).fadeOut(200);
		jQuery('#showpost-'+invariable[0]+' .showpostpostcontent').load(url+'/single_home'+type+'.php',{ 'id': invariable[1], 'type': invariable[0] } ,function () {

		jQuery('html, body').animate({scrollTop:jQuery('#showpost-'+invariable[0]).offset().top -120}, 400);
		jQuery('#showpost-'+invariable[0]+' .postcontent img').imagesLoaded(function () {
			height = jQuery('#showpost-'+invariable[0]+' .showpostpostcontent').height();
			if(height > 500) {
				var newheight = height - 500;
				jQuery('#showpost-'+invariable[0]).animate({"height": "+="+newheight+"px"}, 500);
			}
			if(height < 500) {
				var newheight =  500 - height;
				jQuery('#showpost-'+invariable[0]).animate({"height": "-="+newheight+"px"}, 500);
			}
			jQuery('#showpost-'+invariable[0]+' .showpostload').fadeOut(500);
			jQuery('#showpost-'+invariable[0]+' .showpostpostcontent').delay(600).fadeIn(200);
			jQuery('.closehomeshow-'+invariable[0]+'.closeajax').delay(600).fadeIn(200);	
			
		}) 

		});

	}
	jQuery('.closehomeshow-'+invariable[0]).click(function() {
		var height = jQuery('#showpost-'+invariable[0]).height();
		jQuery('#showpost-'+invariable[0]+' .showpostpostcontent').fadeOut(200);
		jQuery('.closehomeshow-'+invariable[0]+'.closeajax').fadeOut(200);	
		jQuery('#showpost-'+invariable[0]).animate({"height": "-="+height+"px"}, 750);
		jQuery('#remove').delay(100).fadeIn(200);


	});
	});
	});
	
jQuery(document).ready(function(){

jQuery('.menu li a').click(function() {
	var href = jQuery(this).attr('href');
	jQuery("html, body").animate({ scrollTop: jQuery(href).offset().top - 90 }, 1000);
	return false;
});

});

/*smoth scroll*/
jQuery(document).ready(
  function() {  
    
	jQuery("html").niceScroll({cursorcolor:"#CDCDCD",
							   cursorwidth:20, 
							   cursorborder:"none", 
							   cursorborderradius:"0px",
							   background:"#F0F0F0",
							   smoothscroll:true,
							   autohidemode:false,
							   cursoropacitymin:1
							   });
  }
); 


/*Parallax Scrolling Tutorial

jQuery(document).ready(function(){
	// Cache the Window object
	var $window = jQuery(window);
                
   jQuery('.mainwrap').each(function(){
     var $bgobj = jQuery(this); // assigning the object
     // alert(jQuery(this))    ;          
      jQuery(window).scroll(function() {
                    
		// Scroll the background at var speed
		// the yPos is a negative value because we're scrolling it UP!								
		var yPos = -($window.scrollTop() / 10); 
		
		// Put together our final background position
		var coords = '50% '+ yPos + 'px';

		// Move the background
		$bgobj.css({ backgroundPosition: coords });
		
}); // window scroll Ends

 });	

}); 


document.createElement("article");
document.createElement("section");

*/


///////////////////////////////		
// Animate number
///////////////////////////////

function animateValue(id, start, end, duration) {
    var range = end - start;
    var current = start;
  
	var increment = end > start? 1 : -1;
    var stepTime = Math.abs(Math.floor(duration / range));
    var obj = jQuery(id);
    var timer = setInterval(function() {
		if(current <  (end-20) && end > 1000){
			current += 20;
			jQuery(".number-animate").css('opacity',1);}
		if(current <  (end-2) && end < 999){
			current += 2;
			jQuery(id).css('opacity',1);}			
		else{
			current += increment;
		}
        obj.html(current);
        if (current == end) {
			var number = end;
			if(end > 999){ 
			var number1 = end.toString().substr(0,1);
			var number2 = end.toString().substr(1,9);
			var number = number1+','+number2;
			}					
			if(end > 9999){ 
			var number1 = end.toString().substr(0,2);
			var number2 = end.toString().substr(2,9);
			var number = number1+','+number2;
			}					
			obj.html(number) ;
            clearInterval(timer);
			
        }

    }, stepTime);
}


jQuery(document).ready(function(){
	
	jQuery( ".number-animate" ).each(function() {		
		var numberIn = jQuery(this).attr('id');
		
		animateValue('#'+numberIn,0, parseInt(jQuery('#'+numberIn).html()), 6000);
	});		
		

});

jQuery.fn.isOnScreen = function(){
     
    var win = jQuery(window);
     
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
     
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
     
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
     
};

jQuery(document).ready(function(){
	jQuery( ".pagenav.home .menu > li:first-child a" ).addClass('important_color');
	if (jQuery( ".menu-fixedmenu").length) {
		jQuery( ".menu-fixedmenu.home .menu a" ).each(function() {
			var id  = jQuery(this).attr('href');
			if(id.search("#") != -1 ){
				jQuery( window ).scroll(function() {
					
					if(jQuery(id).isOnScreen()){
						jQuery(id+' h2').removeClass('fadeInDown');
						jQuery(id+' h2').addClass('animated fadeInUp');					
						var newid = id.split("#");
						if(document.getElementById(newid[1]).getBoundingClientRect().top < 250){
							jQuery( ".fixedmenu .menu > li a[href='"+id+"']" ).addClass('important_color');
							}
							
						else{
							jQuery( ".fixedmenu .menu > li a[href='"+id+"']" ).removeClass('important_color');					
						}
						 
					}
					else{
						if(id != jQuery( ".menu > li:first-child a" ).attr('href') )
							jQuery( ".fixedmenu .menu > li a[href='"+id+"']" ).removeClass('important_color');
							if(jQuery(this).scrollTop() > 700)
								jQuery( ".menu-fixedmenu.home .menu > li:first-child a" ).removeClass('important_color');
							else
								jQuery( ".menu-fixedmenu.home .menu > li:first-child a" ).addClass('important_color');
								
							jQuery(id+' h2').removeClass('fadeInUp');
							jQuery(id+' h2').addClass('animated fadeInDown');	
						}
					
				});
			}
		});
	}
	
	

});



jQuery(document).ready(function(){
jQuery('.overgallery').hide();
jQuery('.overvideo').hide();
jQuery('.overdefult').hide();
jQuery('.overport').hide();
jQuery(window).load(function () {

jQuery('.one_half').find('.loading').attr('class', '');
jQuery('.one_third').find('.loading').attr('class', '');
jQuery('.one_fourth').find('.loading').attr('class', '');
jQuery('.item').find('.loading').attr('class', '');
jQuery('.item4').find('.loading').attr('class', '');
jQuery('.item3').find('.loading').attr('class', '');
jQuery('.blogimage').find('.loading').attr('class', '');
jQuery('.image').css('background', 'none');
jQuery('.recentimage').css('background', 'none');
jQuery('.audioPlayerWrap').css({'background':'none','height':'25px','padding-top':'0px'});
jQuery('.blogpostcategory').find('.loading').removeClass('loading');
jQuery('.image').find('.loading').removeClass('loading');
//show the loaded image
jQuery('iframe').show();
jQuery('img').show();
jQuery('.audioPlayer').show();
jQuery('.overgallery').show();
jQuery('.overvideo').show();
jQuery('.overdefult').show();
jQuery('.overport').show();
jQuery('#slider-wrapper .loading').removeClass('loading');
jQuery('.imagesSPAll .loading').removeClass('loading');
jQuery('#slider').css('display','block');
jQuery('#slider .images').animate({'opacity':1},300);
jQuery('#slider,#slider img,.textSlide').css('opacity','1');
jQuery('#slider-wrapper').css('max-height','500px');
});
});
function gotosite(sel) {
var URL = sel.options[sel.selectedIndex].value;
window.location.href = URL;
}

/*portfolio click hover*/
jQuery(document).ready(function(){	
jQuery('#remove h2 a:first-child').attr('class','catlink catlinkhover');
jQuery('.catlink').click(function() {
jQuery('#remove h2 a').attr('class','catlink');
jQuery(this).attr('class','catlink catlinkhover');
});	
});



/*add submenu class*/
jQuery(document).ready(function(){
jQuery('.menu > li').each(function() {
if(jQuery(this).find('ul').size() > 0 ){
jQuery(this).addClass('has-sub-menu');
}
});
});
/*animate menu*/
jQuery(document).ready(function(){
jQuery('ul.menu > li').hover(function(){
jQuery(this).find('ul').stop(true,true).fadeIn(300);
},
function () {
jQuery(this).find('ul').stop(true,true).fadeOut(300);
});
});
/*add lightbox*/
jQuery(document).ready(function(){
jQuery(".gallery a").attr("rel", "lightbox[gallery]");
});
/*form hide replay*/
jQuery(document).ready(function(){
jQuery(".reply").click(function(){
jQuery('#commentform h3').hide();
});
jQuery("#cancel-comment-reply-link").click(function(){
jQuery('#commentform h3').show();
});
});

function scroll_menu(){
jQuery(window).bind('scroll', function(){
if(jQuery(this).scrollTop() > 150) {
jQuery(".fixedmenu").slideDown(200);}
else{
jQuery(".fixedmenu").slideUp(200);}
});
}

scroll_menu();

/*browserfix*/
jQuery(document).ready(function(){
if(jQuery.browser.opera){
jQuery('#headerwrap').css('top','0');
jQuery('#wpadminbar').css('display','none');
}
if (jQuery.browser.msie && jQuery.browser.version.substr(0,1)<9) {
jQuery('.cartTopDetails').css('border','1px solid #eee');
jQuery('#headerwrap').css('border-bottom','1px solid #ddd');
}
});
/* lightbox*/
function loadprety(){
jQuery(".gallery a").attr("rel", "lightbox[gallery]").prettyPhoto({theme:'light_rounded',overlay_gallery: false,show_title: false,deeplinking:false});
}

jQuery(document).ready(function(){
jQuery('.gototop').click(function() {
jQuery('html, body').animate({scrollTop:0}, 'medium');
});
});
/*search*/
jQuery(document).ready(function(){
if(jQuery('.widget_search').length>0){
jQuery('#sidebarsearch input').val('Search...');
jQuery('#sidebarsearch input').focus(function() {
jQuery('#sidebarsearch input').val('');
});
jQuery('#sidebarsearch input').focusout(function() {
jQuery('#sidebarsearch input').val('Search...');
});
}
});
jQuery(document).ready(function(){
jQuery('.add_to_cart_button.product_type_simple').live('click', function() {
jQuery(this).parents(".product").children(".process").children(".loading").css("display", "block");
jQuery(this).parents(".product").children(".thumb").children("img").css("opacity", "0.1");
});
jQuery('body').bind('added_to_cart', function() {
jQuery(".product .loading").css("display", "none");
//$(".product .added").parents(".product").children(".process").children(".added-btn").css("display", "block").delay(500).fadeOut('slow');
jQuery(".product .added").parents(".product").children(".thumb").children("img").delay(600).animate( { "opacity": "1" });
return false;
});
});