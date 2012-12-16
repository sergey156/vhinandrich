jQuery(document).ready(function(e) {

	jQuery(window).scroll(function(e) {
		var scroll_val = jQuery(this).scrollTop();
		var height = jQuery(document).height();
		var scroll_perc = (scroll_val / height) * 100;
		
		if(scroll_val >= 100 && scroll_val <= 450){
			if(jQuery('.wedding_ct_view_map_box').css('opacity') <= 0){
				jQuery('.wedding_ct_view_map_box').animate(
					{opacity:1},500,function(){
					}
				).delay(5000).animate(
					{opacity:0},100,function(){}
				);	
			}
		}else{
			if(jQuery('.wedding_ct_view_map_box').css('opacity') >= 1){
				jQuery('.wedding_ct_view_map_box').animate(
					{opacity:0},100,function(){}
				);
			}
		}
		
		scroll_perc -= 10;
		if(scroll_perc < 0){
			scroll_perc = 0;
		}
		
		jQuery('.wedding_ct_top_1_line').css('width',  (100 - scroll_perc) + "%");
		jQuery('.wedding_ct_top_2_line').css('width',  (100 - scroll_perc) + "%");
		jQuery('.wedding_ct_top_3_line').css('width',  (100 - scroll_perc) + "%");
		
		
	});
	
});