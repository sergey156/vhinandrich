var hpr_timer = null;
var hpr_interval = 8000;
clearInterval(hpr_timer);
hpr_timer = setInterval('hpr_slide()', hpr_interval);

var max_width = 1080;

jQuery(document).ready(function(e) {
	
	
	var max_logo_mar_bot = jQuery('#logo a img').css('margin-bottom');
	
	if(jQuery(window).width() < max_width){
		jQuery('.vhinrich-mp-rotator-active').css('display','none');
		jQuery('.vhinrich-mp-rotator-nav').css('display','none');
		jQuery('.vhinrich-mp-rotator-mobile').css('display','block');
	}else{
		jQuery('.vhinrich-mp-rotator-active').css('display','block');
		jQuery('.vhinrich-mp-rotator-nav').css('display','block');
		jQuery('.vhinrich-mp-rotator-mobile').css('display','none');
	}
	
	jQuery(window).scroll(function(e) {
		//alert(jQuery(this).scrollTop());
		if(jQuery(window).width() >= max_width){
			var mar_bot = parseInt(max_logo_mar_bot) - jQuery(this).scrollTop();
			if(mar_bot >= jQuery('#logo a img').height() * -1){
				jQuery('#logo a img').css('margin-bottom', mar_bot);
			}
		}else{
			jQuery('#logo a img').css('margin-bottom', max_logo_mar_bot);
		}
		
		var mar_bot_pct = 90 + mar_bot;
		if(mar_bot_pct < 100){
			jQuery('#logo a img').css('opacity', mar_bot_pct * .01);
		}else{
			jQuery('#logo a img').css('opacity', 1);
		}
		
	});
	
	jQuery(window).resize(function(){
		jQuery('#primary-menu-bar').removeAttr('style');
		jQuery('.menu-down').removeAttr('style');
		if(jQuery(window).width() < max_width){
			jQuery('.vhinrich-mp-rotator-active').css('display','none');
			jQuery('.vhinrich-mp-rotator-nav').css('display','none');
			jQuery('.vhinrich-mp-rotator-mobile').css('display','block');
		}else{
			jQuery('.vhinrich-mp-rotator-active').css('display','block');
			jQuery('.vhinrich-mp-rotator-nav').css('display','block');
			jQuery('.vhinrich-mp-rotator-mobile').css('display','none');
		}
	});
	
	if(jQuery('.pager-load-more').length == 0){
		jQuery('#back-to-top-wrapper').css('display','none');		
	}else{
		jQuery('#back-to-top-wrapper').css('display','block');
	}
	
	jQuery('#back-to-top').click(function(e){
		jQuery('html,body').animate(
			{scrollTop:0},1000,function(){}
		);
	});
	
	jQuery('.hpr-show-info').click(function(e) {
		if(jQuery('.hpr-content-container').css('opacity') != 0){
			jQuery('.hpr-content-container').animate(
				{
					opacity:0
				},500,function(){
					jQuery(this).css('display', 'none');
				}
			);
		}else{
			jQuery('.hpr-content-container').css('display', 'block');
			jQuery('.hpr-content-container').animate(
				{
					opacity:1
				},500,function(){
					
				}
			);
		}
	});
	
	jQuery('.menu-down').click(function(e) {
		jQuery(this).animate(
			{height:0},200,function(){
				jQuery('#primary-menu-bar').css('height','auto');
				var height = parseInt(jQuery('#primary-menu-bar').css('height'));
				jQuery('#primary-menu-bar').css('height','0px');
				
				jQuery('#primary-menu-bar').css('top',0);
				jQuery('#primary-menu-bar').animate(
					{
						height: height
					},500,function(){
					}
				);
				jQuery(this).css('display','none');
			}
		);
    });
	
	jQuery('#primary-menu-bar ul li.expanded').each(function(index, element) {
		jQuery(this).append('<div class="primary-menu-bar-submenu"></div>');
		jQuery(this).children('.primary-menu-bar-submenu').html(jQuery(element).children('ul'));
	});
	
	var timer = null;
	var curr_menu = null;
	jQuery('#primary-menu-bar ul li.expanded').hover(
		function(e){
			
			jQuery(this).css('background','white');
				
			if(timer){
				clearTimeout(timer);
				timer = null;
			}
			curr_menu = jQuery(this);
			timer = setTimeout(function(){
				//jQuery(this).children('ul.menu').css('display','inline');
				jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('opacity','0');
				jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('display','inline-block');
				jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('visibility','visible');
				jQuery(curr_menu).find('.primary-menu-bar-submenu ul').stop().animate(
					{
						height:40
					},200,function(){
						jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').stop().animate(
							{
								opacity:1
							},200,function(){
								if(timer){
									jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('display','inline-block');
									jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('visibility','visible');
									jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('opacity','1');
								}
							}
						);
					}
				)
			},100);
		},
		function(e){
			//jQuery(this).children('ul.menu').css('display','none');
			jQuery(this).css('background','none');
			
			if(timer){
				clearTimeout(timer);
				timer = null;
			}
			curr_menu = jQuery(this);
			jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('display','none');
			jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('visibility','hidden');
			jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('opacity','0');
			
			jQuery(curr_menu).find('.primary-menu-bar-submenu ul').stop().animate(
				{height:0},100,function(){
					jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').stop().animate(
						{
							opacity:0
						},100,function(){
							jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('display','none');
							jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('visibility','hidden');
							jQuery(curr_menu).find('.primary-menu-bar-submenu ul li').css('opacity','0');
						}
					);
				}
			);
		}
	);
	
	jQuery('.nav-item').click(function(e) {
		clearInterval(hpr_timer);
		
		var hpr_current_active_id = jQuery('.vhinrich-mp-rotator .hpr-item.active').attr('id');
		hpr_current_active_id = hpr_current_active_id.replace('hpr-item-','');
		
		var hpr_active_id = jQuery(this).parent().attr('id');
		if(hpr_active_id){
			hpr_active_id = hpr_active_id.replace('hpr-item-nav-','');
		}
		
		
		var hpr_item_count = jQuery('.vhinrich-mp-rotator .hpr-item').length;
		
		if(hpr_active_id==0){
			hpr_active_id = hpr_item_count;
		}
		
		jQuery('.vhinrich-mp-rotator .hpr-item').removeClass('active');
		jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_active_id).addClass('active');
		
		var hpr_next_active_id = hpr_active_id;
		if(hpr_active_id == hpr_item_count){
			hpr_next_active_id = 1;
		}else{
			hpr_next_active_id = parseInt(hpr_active_id) + parseInt(1);
		}
		
		jQuery('.vhinrich-mp-rotator-active').html('');
		
		var hpr_next_active_id = hpr_active_id;
		if(hpr_active_id == hpr_item_count){
			hpr_next_active_id = 1;
		}else{
			hpr_next_active_id = parseInt(hpr_active_id) + parseInt(1);
		}
		
		var active_li = jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_current_active_id).html();
		active_li = '<li class="hpr-item active" id="hpr-item-1">' + active_li + '</li>';
		var next_li = jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_active_id).html();
		next_li = '<li class="hpr-item" id="hpr-item-2">' + next_li + '</li>';
		
		jQuery('.vhinrich-mp-rotator-active').append(active_li);
		jQuery('.vhinrich-mp-rotator-active').append(next_li);
		
		jQuery('.vhinrich-mp-rotator-active .hpr-item').css('z-index',0);
		jQuery('.vhinrich-mp-rotator-active .hpr-item.active').css('z-index',1);
		
		jQuery('.vhinrich-mp-rotator-active .hpr-item.active').animate(
		{
			opacity:0
		},1000,function(){
			
			
			jQuery('.vhinrich-mp-rotator .hpr-item').removeClass('active');
			jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_active_id).addClass('active');
			
			jQuery('.vhinrich-mp-rotator-nav .hpr-item .nav-item').removeClass('active');
			jQuery('.vhinrich-mp-rotator-nav #hpr-item-nav-' + hpr_active_id + ' .nav-item').addClass('active');
			
			
			jQuery('.vhinrich-mp-rotator .hpr-item').removeClass('active');
			jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_active_id).addClass('active');
			
			jQuery('.vhinrich-mp-rotator-nav .hpr-item .nav-item').removeClass('active');
			jQuery('.vhinrich-mp-rotator-nav #hpr-item-nav-' + hpr_active_id + ' .nav-item').addClass('active');
			
			jQuery('.vhinrich-mp-rotator-active').html('');
			
			var hpr_next_active_id = hpr_active_id;
			if(hpr_active_id == hpr_item_count){
				hpr_next_active_id = 1;
			}else{
				hpr_next_active_id = parseInt(hpr_active_id) + parseInt(1);
			}
			
			var active_li = jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_active_id).html();
			active_li = '<li class="hpr-item active" id="hpr-item-1">' + active_li + '</li>';
			var next_li = jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_next_active_id).html();
			next_li = '<li class="hpr-item" id="hpr-item-2">' + next_li + '</li>';
			
			jQuery('.vhinrich-mp-rotator-active').append(active_li);
			jQuery('.vhinrich-mp-rotator-active').append(next_li);
			
			jQuery('.vhinrich-mp-rotator-active .hpr-item').css('z-index',0);
			jQuery('.vhinrich-mp-rotator-active .hpr-item.active').css('z-index',1);
			
			clearInterval(hpr_timer);
			hpr_timer = setInterval('hpr_slide()', hpr_interval);
		});
    });
});

hpr_slide = function(){
	if(jQuery(window).width() >= max_width){
		clearInterval(hpr_timer);
		jQuery('.vhinrich-mp-rotator-active .hpr-item.active').animate(
			{
				opacity:0
			},1000,function(){
				var hpr_active_id = (jQuery('.vhinrich-mp-rotator .hpr-item.active').attr('id'));
				if(hpr_active_id){
					hpr_active_id = hpr_active_id.replace('hpr-item-','');
				}
				var hpr_item_count = jQuery('.vhinrich-mp-rotator .hpr-item').length;
				if(hpr_item_count == hpr_active_id){
					hpr_active_id = 1;
				}else{
					hpr_active_id = parseInt(hpr_active_id) + parseInt(1);
				}
				jQuery('.vhinrich-mp-rotator .hpr-item').removeClass('active');
				jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_active_id).addClass('active');
				
				jQuery('.vhinrich-mp-rotator-nav .hpr-item .nav-item').removeClass('active');
				jQuery('.vhinrich-mp-rotator-nav #hpr-item-nav-' + hpr_active_id + ' .nav-item').addClass('active');
				
				jQuery('.vhinrich-mp-rotator-active').html('');
				
				var hpr_next_active_id = hpr_active_id;
				if(hpr_active_id == hpr_item_count){
					hpr_next_active_id = 1;
				}else{
					hpr_next_active_id = parseInt(hpr_active_id) + parseInt(1);
				}
				
				var active_li = jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_active_id).html();
				active_li = '<li class="hpr-item active" id="hpr-item-1">' + active_li + '</li>';
				var next_li = jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_next_active_id).html();
				next_li = '<li class="hpr-item" id="hpr-item-2">' + next_li + '</li>';
				
				jQuery('.vhinrich-mp-rotator-active').append(active_li);
				jQuery('.vhinrich-mp-rotator-active').append(next_li);
				
				jQuery('.vhinrich-mp-rotator-active .hpr-item').css('z-index',0);
				jQuery('.vhinrich-mp-rotator-active .hpr-item.active').css('z-index',1);
				
				
				hpr_timer = setInterval('hpr_slide()', hpr_interval);
			}
		);
		/*var hpr_active_id = (jQuery('.hpr-item.active').attr('id'));
		if(hpr_active_id){
			hpr_active_id = hpr_active_id.replace('hpr-item-','');
		}
		
		jQuery('#hpr-item-' + hpr_active_id).animate(
			{
				opacity:0
			},500,function(){
				var hpr_item_count = jQuery('.hpr-item').length;
				if(hpr_item_count == hpr_active_id){
					hpr_active_id = 1;
				}else{
					hpr_active_id = parseInt(hpr_active_id) + parseInt(1);
				}
				jQuery('.hpr-item').removeClass('active');
				jQuery('#hpr-item-' + hpr_active_id).addClass('active');
				jQuery('#hpr-item-' + hpr_active_id).css('opacity',0);
				jQuery('#hpr-item-' + hpr_active_id).animate(
					{
						opacity:1
					},500,function(){
						hpr_timer = setInterval('hpr_slide()', hpr_interval);
					}
				);
			}
		);*/
	}
}

jQuery(document).ready(function(e) {
	(function ($) {
		Drupal.behaviors.slider = {
			attach:function(context) {
				var script = 'http://s7.addthis.com/js/250/addthis_widget.js#domready=1';
				if (window.addthis) {
					window.addthis = null;
				}
				$.getScript(script);
	
			}
	
		};
	}(jQuery));
});