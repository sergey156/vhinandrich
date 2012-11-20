jQuery(document).ready(function(e) {

	jQuery(window).scroll(function(e) {
		var scroll_val = jQuery(this).scrollTop();
		var height = jQuery(document).height();
		var scroll_perc = (scroll_val / height) * 100;
		
		scroll_perc -= 10;
		if(scroll_perc < 0){
			scroll_perc = 0;
		}
		
		jQuery('.wedding_ct_top_1_line').css('width',  (100 - scroll_perc) + "%");
		jQuery('.wedding_ct_top_2_line').css('width',  (100 - scroll_perc) + "%")
    });
	
});