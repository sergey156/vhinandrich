(function ($) {

  Drupal.behaviors.mqcristobal_flickr = {
    attach: function (context, settings) {
		
		var timer_id = null;
		if(settings.mqcristobal_flickr.type == 'random-photos'){
			photos = settings.mqcristobal_flickr.data;
			$.each(photos, function(index, value){
				$.get('?q=mqcristobal-flickr-frontpage-get-photo/' + value.id,null,function(data){
					//alert(data.data.toSource());
					$('#mqc-flickr-photo-container-' + value.id).html(data.data);
				},"json");
			});
			
			clearInterval(timer_id);
			timer_id = setInterval('mqcristobal_flickr_slide()', 5000);
		}
		
		
		var op_add = false;
		var selected_id = 1;
		var new_left = 0;
		mqcristobal_flickr_slide = function(){
			left = $('.mqc-flickr-main-page-rotator-holder').css('margin-left');
			left = parseInt(left);
			if(op_add){
				if(left >=0){
					op_add = false;
					new_left = -1024;
					selected_id+=2;
				}else{
					new_left = 1024;
				}
				selected_id--;
			}else{			
				if(left <= -9216){
					op_add = true;
					new_left = 1024;
					selected_id-=2;
				}else{
					new_left = -1024;
				}
				selected_id++;
			}
			new_left = parseInt(selected_id) * 1024 * -1;
			new_left += 1024;
			$('.mqc-flickr-photo-pager-btn').removeClass('selected');
			$('#mqc-flickr-photo-pager-btn-' + selected_id).addClass('selected');
			$('.mqc-flickr-main-page-rotator-holder').animate(
				{
					marginLeft: new_left
				},300,function(){
					
				}
			);
			
		}
		
		$('.mqc-flickr-photo-pager-btn').click(function(){
			clearInterval(timer_id);
			
			$('.mqc-flickr-photo-pager-btn').removeClass('selected');
			$(this).addClass('selected');
			var id = $(this).attr('id');
			id = id.replace(/\mqc-flickr-photo-pager-btn-/,'');
			new_left = parseInt(id) * 1024 * -1;
			new_left += 1024;
			selected_id = id;
			$('.mqc-flickr-main-page-rotator-holder').animate(
				{
					marginLeft: new_left
				},300,function(){
				}
			);
			
			timer_id = setInterval('mqcristobal_flickr_slide()', 5000);
		});
    }
  };

})(jQuery);