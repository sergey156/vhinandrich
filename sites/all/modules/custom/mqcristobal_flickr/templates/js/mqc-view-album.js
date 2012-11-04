(function ($) {

  Drupal.behaviors.mqcristobal_flickr = {
    attach: function (context, settings) {
		if(settings.mqcristobal_flickr.type == 'photoset-album'){
			photos = settings.mqcristobal_flickr.data;
			$.each(photos.photo, function(index, value){
				$.get('?q=mqcristobal-flickr-view-album/' + photos.setid + '/' + value.id,null,function(data){
					//alert(data.data.toSource());
					$('#mqc-flickr-photoset-photo-' + value.id).html(data.main);
					$('#mqc-flickr-photoset-thumb-' + value.id).html(data.thumb);
				},"json");
			});
			
			var timerId = null;
			var album_left = 0;
			var img_width = 1024;
			var ltr = true;
			
			animate_slide = function(){
				if(ltr){
					album_left = album_left - img_width;					
					if( parseInt($('.mqc-flickr-view-album-main-holder').css('width')) + album_left <=0 ){
						album_left += img_width * 2;
						ltr = false;
					}
				}else{
					album_left = album_left + img_width;					
					if( album_left >= img_width ){
						album_left -= img_width * 2;
						ltr = true;
					}
				}
				$('.mqc-flickr-view-album-main-holder').animate(
					{
						marginLeft:album_left
					},500,function(){
						$(this).css('margin-left',album_left);
					}
				);
			}
			
			
			
			clearInterval(timerId);
			timerId = setInterval(function(){animate_slide();},5000);
			
			
			$('.mqc-flickr-view-album-thumbs-photo').hover(
				function(e){
					if($(this).children('.mqc-flickr-photoset-thumb').children().find('.mqc-flickr-album-thumb')){
						$(this).prepend('<div class="thumb-viewer">' + $(this).html() + '</div>');
						$('.thumb-viewer').css('opacity',0);
						$('.thumb-viewer').animate(
							{
								opacity:1
							},300,function(){}
						);
					}
				},
				function(e){
					$(this).children('.thumb-viewer').remove();
				}
			);
		}
	}
  }
})(jQuery);